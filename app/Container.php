<?php

use App\Persistence\DisciplinaDAO;
use App\Persistence\GrupoDAO;
use App\Persistence\GrupoDisciplinaCursoDAO;
use App\Persistence\NotaDAO;
use App\Persistence\OportunidadeDAO;
use App\Persistence\UsuarioDAO;
use App\Persistence\CertificadoDAO;
use App\Persistence\GradeDAO;
use App\Persistence\GradeDisciplinaDAO;
use App\Persistence\MedalhaUsuarioDAO;
use App\Persistence\CategoriaDAO;
use App\Persistence\TopicoDAO;
use App\Persistence\RespostaDAO;
use App\Persistence\QuestaoDAO;
use App\Persistence\QuestionarioDAO;
use App\Persistence\QuestaoQuestionarioDAO;
use App\Persistence\AvaliacaoDAO;
use App\Persistence\TurmaDAO;
use App\Persistence\ProfessorTurmaDAO;
use App\Persistence\RespostaAvaliacaoDAO;
use \Doctrine\ORM\EntityManager;
use Slim\Views\Smarty;

/**
 * @property DisciplinaDAO disciplinaDAO
 * @property NotaDAO notaDAO
 * @property UsuarioDAO usuarioDAO
 * @property CertificadoDAO certificadoDAO
 * @property GradeDAO gradeDAO
 * @property GradeDisciplinaDAO gradeDisciplinaDAO
 * @property MedalhaUsuarioDAO medalhaUsuarioDAO
 * @property CategoriaDAO categoriaDAO
 * @property TopicoDAO topicoDAO
 * @property RespostaDAO respostaDAO
 * @property OportunidadeDAO oportunidadeDAO
 * @property QuestaoDAO questaoDAO
 * @property QuestionarioDAO questionarioDAO
 * @property QuestaoQuestionarioDAO questaoQuestionarioDAO
 * @property AvaliacaoDAO avaliacaoDAO
 * @property TurmaDAO turmaDAO
 * @property ProfessorTurmaDAO professorTurmaDAO
 * @property RespostaAvaliacaoDAO respostaAvaliacaoDAO
 * @property GrupoDAO grupoDAO
 * @property GrupoDisciplinaCursoDAO grupoDisciplinaCursoDAO
 * @property Smarty view
 * @property EntityManager db
 */
class Container extends \Slim\Container
{
    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $this->registerDependencies();
    }

    private function registerDependencies() {

        $this['view'] = function () {
            $settings = $this->settings;
            $view = new \Slim\Views\Smarty($settings['view']['template_path'], $settings['view']['smarty']);

            // Add Slim specific plugins
            $smartyPlugins = new \Slim\Views\SmartyPlugins($this['router'], $this['request']->getUri());
            $view->registerPlugin('function', 'path_for', [$smartyPlugins, 'pathFor']);
            $view->registerPlugin('function', 'base_url', [$smartyPlugins, 'baseUrl']);

            // Logged User set null
            $view['loggedUser'] = null;

            return $view;
        };


        //Not Found
        $this['notFoundHandler'] = function () {
            return function ($request, $response) {
                return $this->view->render($response, '404.tpl')->withStatus(404);
            };
        };

        //Doctrine
        $this['db'] = function () {
            $settings = $this->settings;

            $config = new \Doctrine\ORM\Configuration();
            $config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
            $driverImpl = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(new \Doctrine\Common\Annotations\AnnotationReader(),
                $settings['doctrine']['model']);
            \Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
            $config->setMetadataDriverImpl($driverImpl);
            $config->setQueryCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
            $config->setProxyDir($settings['doctrine']['cache_proxy']);
            $config->setProxyNamespace('App\Cache\Proxies');

            $config->setAutoGenerateProxyClasses(true);

            return EntityManager::create($settings['db'], $config);
        };

        //Doctrine DAOs
        $this['disciplinaDAO'] = function () {
            return new DisciplinaDAO($this->db);
        };

        $this['usuarioDAO'] = function () {
            return new UsuarioDAO($this->db);
        };

        $this['respostaAvaliacaoDAO'] = function () {
            return new RespostaAvaliacaoDAO($this->db);
        };

        $this['avaliacaoDAO'] = function () {
            return new AvaliacaoDAO($this->db);
        };

        $this['notaDAO'] = function () {
            return new NotaDAO($this->db);
        };

        $this['certificadoDAO'] = function () {
            return new CertificadoDAO($this->db);
        };

        $this['gradeDAO'] = function () {
            return new GradeDAO($this->db);
        };

        $this['gradeDisciplinaDAO'] = function () {
            return new GradeDisciplinaDAO($this->db);
        };

        $this['medalhaUsuarioDAO'] = function () {
            return new MedalhaUsuarioDAO($this->db);
        };

        $this['categoriaDAO'] = function () {
            return new CategoriaDAO($this->db);
        };

        $this['topicoDAO'] = function () {
            return new TopicoDAO($this->db);
        };

        $this['respostaDAO'] = function () {
            return new RespostaDAO($this->db);
        };

        $this['oportunidadeDAO'] = function () {
            return new OportunidadeDAO($this->db);
        };

        $this['questaoDAO'] = function () {
            return new QuestaoDAO($this->db);
        };

        $this['questionarioDAO'] = function () {
            return new QuestionarioDAO($this->db);
        };

        $this['questaoQuestionarioDAO'] = function () {
            return new QuestaoQuestionarioDAO($this->db);
        };

        $this['turmaDAO'] = function () {
            return new TurmaDAO($this->db);
        };

        $this['professorTurmaDAO'] = function () {
            return new ProfessorTurmaDAO($this->db);
        };

        $this['grupoDAO'] = function () {
            return new GrupoDAO($this->db);
        };

        $this['grupoDisciplinaCursoDAO'] = function () {
            return new GrupoDisciplinaCursoDAO($this->db);
        };
    }

}