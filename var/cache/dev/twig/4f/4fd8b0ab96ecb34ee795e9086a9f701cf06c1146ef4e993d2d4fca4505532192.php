<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* login/login.html.twig */
class __TwigTemplate_c03cf897ef12b3b4be784589cf5f718588840a4bdd20f4da6e6f3f055641b511 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "login/login.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "login/login.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "login/login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "\tKnowMe
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 8
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 9
        echo "\t<section id=\"intro\">
\t\t<div class=\"intro-container\" data-aos=\"zoom-in\" data-aos-delay=\"100\">
\t\t\t<div class=\"form\">
\t\t\t\t<h1 class=\"mb-4 pb-0\">Connectez-vous sur<br><span>KnowMe</span>
\t\t\t\t</h1>
\t\t\t\t<form action=\"/\" method=\"post\" role=\"form\" class=\"php-email-form\">
\t\t\t\t\t<div class=\"form-row\"></div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"subject\" id=\"subject\" placeholder=\"Email\" data-rule=\"minlen:4\" data-msg=\"Please enter at least 8 chars of subject\"/>
\t\t\t\t\t\t<div class=\"validate\"></div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" name=\"subject\" id=\"subject\" placeholder=\"Password\" data-rule=\"minlen:4\" data-msg=\"Please enter at least 8 chars of subject\"/>
\t\t\t\t\t\t<div class=\"validate\"></div>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<button class=\"about-btn scrollto\" type=\"submit\">Connexion
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div>

\t\t\t\t\t\t<a href=\"/register\" class=\"no_account\">Vous n’avez pas de compte  ? Inscrivez-vous</a>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</section>
\t";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "login/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 9,  80 => 8,  69 => 4,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}
\tKnowMe
{% endblock %}


{% block body %}
\t<section id=\"intro\">
\t\t<div class=\"intro-container\" data-aos=\"zoom-in\" data-aos-delay=\"100\">
\t\t\t<div class=\"form\">
\t\t\t\t<h1 class=\"mb-4 pb-0\">Connectez-vous sur<br><span>KnowMe</span>
\t\t\t\t</h1>
\t\t\t\t<form action=\"/\" method=\"post\" role=\"form\" class=\"php-email-form\">
\t\t\t\t\t<div class=\"form-row\"></div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"subject\" id=\"subject\" placeholder=\"Email\" data-rule=\"minlen:4\" data-msg=\"Please enter at least 8 chars of subject\"/>
\t\t\t\t\t\t<div class=\"validate\"></div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<input type=\"password\" class=\"form-control\" name=\"subject\" id=\"subject\" placeholder=\"Password\" data-rule=\"minlen:4\" data-msg=\"Please enter at least 8 chars of subject\"/>
\t\t\t\t\t\t<div class=\"validate\"></div>
\t\t\t\t\t</div>

\t\t\t\t\t<div>
\t\t\t\t\t\t<button class=\"about-btn scrollto\" type=\"submit\">Connexion
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div>

\t\t\t\t\t\t<a href=\"/register\" class=\"no_account\">Vous n’avez pas de compte  ? Inscrivez-vous</a>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</section>
\t{% endblock %}
", "login/login.html.twig", "C:\\Users\\msi\\Desktop\\KnowMe\\know-me-web\\templates\\login\\login.html.twig");
    }
}
