<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Universidad XYZ
    </title>
    <div class="top-nav-title">
            <a href="<?= $this->url->build('/users/logout')?>"><span>Cerrar Sesion</a>

            
</div>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <h1>
                Universidad XYZ
            </h1>
            <p>Donde la excelencia académica se encuentra con la innovación</p>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="column">
                        <div class="message default text-center">
                            <h2>Bienvenido a la Universidad XYZ</h2>
                            <p>En nuestra institución, nos enorgullece contar con los mejores profesores altamente calificados en sus respectivas áreas. Ofrecemos una amplia gama de carreras competitivas y materias innovadoras para preparar a nuestros estudiantes para el éxito en el mundo real.</p>
                        </div>
                    </div>
                </div>
                <div class="column">
    <h4>Tablas</h4>
    <ul>
        <li>
            <button onclick="window.location.href = '<?= $this->Url->build(['controller' => 'Students', 'action' => 'index']) ?>'">
                Alumnos
            </button>
        </li>
        <li>
            <button onclick="window.location.href = '<?= $this->Url->build(['controller' => 'Professors', 'action' => 'index']) ?>'">
                Profesores
            </button>
        </li>
        <li>
            <button onclick="window.location.href = '<?= $this->Url->build(['controller' => 'Courses', 'action' => 'index']) ?>'">
                Materias
            </button>
        </li>
        <li>
            <button onclick="window.location.href = '<?= $this->Url->build(['controller' => 'Careers', 'action' => 'index']) ?>'">
                Carreras
            </button>
        </li>
        <li>
            <button onclick="window.location.href = '<?= $this->Url->build(['controller' => 'Notes', 'action' => 'index']) ?>'">
                Calificaciones
            </button>
        </li>
        <li>
            <button onclick="window.location.href = '<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>'">
                Usuarios
            </button>    
        </li>
    </ul>
</div>
                <hr>
                <div class="row">
                    <div class="column links">
                        <h3>¿Por qué elegirnos?</h3>
                        <ul>
                            <li>Excelencia académica</li>
                            <li>Profesores altamente calificados</li>
                            <li>Carreras competitivas</li>
                            <li>Materias innovadoras</li>
                            <li>Instalaciones modernas y equipadas</li>
                            <li>Oportunidades de prácticas y empleo</li>
                            <li>Red de exalumnos exitosos</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                        <h3>Recursos adicionales</h3>
                        <ul>
                            <li><a target="_blank" rel="noopener" href="https://www.universidadxyz.edu">Sitio web de la Universidad XYZ</a></li>
                            <li><a target="_blank" rel="noopener" href="https://www.universidadxyz.edu/oferta-academica">Oferta académica</a></li>
                            <li><a target="_blank" rel="noopener" href="https://www.universidadxyz.edu/admisiones">Proceso de admisiones</a></li>
                            <li><a target="_blank" rel="noopener" href="https://www.universidadxyz.edu/becas">Becas y ayudas financieras</a></li>
                            <li><a target="_blank" rel="noopener" href="https://www.universidadxyz.edu/instalaciones">Visita nuestras instalaciones</a></li>
                            <li><a target="_blank" rel="noopener" href="https://www.universidadxyz.edu/contacto">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
