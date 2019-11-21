@servers(['aws' => 'ubuntu@3.16.13.217'])
@include('vendor/autoload.php')

@setup
$origin = 'git@github.com:JDBYTE/curso-envoy';
$branch = isset($branch) ? $branch : 'master';
$app_dir = '/var/www/html';


if( !isset($on)){
throw  new Exception('La variable --on no esta definida');

}

@endsetup


@task('git:clone',['on' => $on])
   cd {{ $app_dir }}
   echo "Hemos entrado al directorio /var/www/html";
   git clone @origin;
   echo "Repositorio clonado correctamente";
@endtask



@task('ls',['on' => $on])
cd {{ $app_dir }}
ls -la 
@endtask