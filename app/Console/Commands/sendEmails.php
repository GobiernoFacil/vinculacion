<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mail;
use App\User;

class sendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {type} {data=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Esta librería ejecuta el envío de correos en segundo plano sin entorpecer el funcionamiento del sitio';

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
     * @return mixed
     */
    public function handle()
    {
      $type = $this->argument('type');
      switch($type){
        case "suscribe":
          $this->suscribeMessage($this->argument('data'));
          break;
        case "new_email":
          $this->changeEmail($this->argument('data'));
          break;

        default:
          return;
          break;
      }
    }

    private function suscribeMessage($id){
      $user = User::findOrFail($id);

      Mail::send('emails.suscribe', ['user' => $user], function ($m) use ($user) {
        $m->from('empleouniversitario@puebla.gob.mx', 'Empleo Universitario');
        $m->to($user->email, "Estimado usuario")->subject('¡Bienvenido a la plataforma de trabajo abierto!');
      });
    }

    private function changeEmail($id){
      $user = User::findOrFail($id);

      Mail::send('emails.new-email', ['user' => $user], function($m) use($user){
        $m->from('empleouniversitario@puebla.gob.mx', 'Empleo Universitario');
        $m->to($user->email, "Estimado usuario")->subject('¡Tu usuario de Empleo Universitario ha cambiado!');
      });
    }
}
