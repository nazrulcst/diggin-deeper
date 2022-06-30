<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'user:create {name} {email} {password?}';
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user into your database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $count = User::all()->toArray();
        $this->output->progressStart(count($count));

        foreach($count as $index){
            sleep(1);
            print_r($count);
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();

        // $user = User::factory()->times(1000)->create();//Using model factory
        // $this->output->progressAdvance();
        // $this->info('The new user  is created');
        // $this->output->progressFinish();

        // try {
        //     $password = $this->argument('password');
        //     $user = new User();
        //     $user->name = $this->argument('name');
        //     $user->email = $this->argument('email');
        //     $user->password = $password ? bcrypt($password) : bcrypt(123456);
        //     $user->email_verified_at = now();
        //     $user->remember_token = Str::random(10);
        //     $user->save();
        //     $this->info($user->name . ' created successfully!');
        // } catch (\Throwable $th) {
        //     $this->error($th->getMessage());
        // }

        // $name = $this->ask('what is your name ?');
        // $email = $this->ask('what is your email ?');
        // $password = $this->secret('what is your Password ?');

        // if($this->confirm('Are you sure to')){
        //     try {
                
        //         $user = new User();
        //         $user->name = $name;
        //         $user->email = $email;
        //         $user->password = bcrypt($password);
        //         $user->email_verified_at = now();
        //         $user->remember_token = Str::random(10);
        //         $user->save();
        //         $this->info($user->name . ' created successfully!');
        //     } catch (\Throwable $th) {
        //         $this->error($th->getMessage());
        //     }
        // }else{
        //     $this->warn('You have cancel the user creation');
        // }
    }
}
