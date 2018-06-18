<?php

use Illuminate\Database\Seeder;
use App\Gasto;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $user_email = str_random(4).'@gmail.com';
        $cats = array(
        "Alimentação",
        "Animal de estimação",
        "Casa",
        "Educação",
        "Gastos Pessoais",
        "Impostos",
        "Lazer",
        "Receita",
        "Saúde",
        "Seguros",
        "Serviços Financeiros",
        "Transporte"
        );

        DB::table('usuarios')->insert([
            'nome' => str_random(10),
            'email' => $user_email,
            'password' => \Hash::make('123456789'),
            'nascimento' => '1111-11-11',
            'ccredito' => true,
            'cdebito' => true,
            'boleto' =>true
        ]);

        foreach($cats as $categ ) {
            DB::table('categorias')->insert([
                'nome' => $categ
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            $int = rand(1262055681, 1529283467);
            $date = date("Y-m-d H:i:s",$int);

            $gasto = new Gasto([
                'email' => $user_email,
                'valor' => (rand(1,4000)),
                'descricao' => str_random(10),
                'catid' => (rand(1,11)),
                'pagamento' => 'cc',
                'created_at' => $date
            ]);
            $gasto->save();
        }
        
        for ($i = 1; $i <= 10; $i++) {
            DB::table('receitas')->insert([
                'email' => $user_email,
                'valor' => (rand(1, 4000)),
                'descricao' => str_random(10)
            ]); 
        }

        for ($i = 1; $i <= 10; $i++) {
            DB::table('listas')->insert([
                'email' => $user_email,
                'descricao' => str_random(10)
            ]); 
        }
       
    }
}
