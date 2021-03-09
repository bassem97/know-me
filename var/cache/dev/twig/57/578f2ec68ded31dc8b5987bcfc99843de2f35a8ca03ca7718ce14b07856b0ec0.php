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

/* nav/navbar.html.twig */
class __TwigTemplate_63a8ffa5481a0d6c6516d75db849cc3e85b9fe849ec08f397be8118209bd3900 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nav/navbar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "nav/navbar.html.twig"));

        // line 1
        echo "<header id=\"header\" class=\"d-flex align-items-center header-scrolled\">
\t<div class=\"container\">

\t\t<div id=\"logo\" class=\"pull-left\">
\t\t\t<!-- Uncomment below if you prefer to use a text logo -->
\t\t\t<!-- <h1><a href=\"#intro\">The<span>Event</span></a></h1>-->
\t\t\t\t<a href=\"/\" class=\"scrollto\"> <img src=\"assets/img/logo.png\" alt=\"\" title=\"\"></a>
\t\t</div>

\t\t<nav id=\"nav-menu-container\">
\t\t\t<ul class=\"nav-menu\">
\t\t\t\t<li class=\"menu-active\">
\t\t\t\t\t<a href=\"index.html\">Home</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#about\">About</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#speakers\">Speakers</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#schedule\">Schedule</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#venue\">Venue</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#hotels\">Hotels</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#gallery\">Gallery</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#supporters\">Sponsors</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#contact\">Contact</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"buy-tickets\">
\t\t\t\t\t<a href=\"/login\">Connexion</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</nav>
\t\t<!-- #nav-menu-container -->
\t</div>
</header>
<!-- End Header -->

<!-- End Intro Section -->
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "nav/navbar.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header id=\"header\" class=\"d-flex align-items-center header-scrolled\">
\t<div class=\"container\">

\t\t<div id=\"logo\" class=\"pull-left\">
\t\t\t<!-- Uncomment below if you prefer to use a text logo -->
\t\t\t<!-- <h1><a href=\"#intro\">The<span>Event</span></a></h1>-->
\t\t\t\t<a href=\"/\" class=\"scrollto\"> <img src=\"assets/img/logo.png\" alt=\"\" title=\"\"></a>
\t\t</div>

\t\t<nav id=\"nav-menu-container\">
\t\t\t<ul class=\"nav-menu\">
\t\t\t\t<li class=\"menu-active\">
\t\t\t\t\t<a href=\"index.html\">Home</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#about\">About</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#speakers\">Speakers</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#schedule\">Schedule</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#venue\">Venue</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#hotels\">Hotels</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#gallery\">Gallery</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#supporters\">Sponsors</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"#contact\">Contact</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"buy-tickets\">
\t\t\t\t\t<a href=\"/login\">Connexion</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</nav>
\t\t<!-- #nav-menu-container -->
\t</div>
</header>
<!-- End Header -->

<!-- End Intro Section -->
", "nav/navbar.html.twig", "D:\\CoursEsprit\\cours3\\PIDEV\\know-me\\templates\\nav\\navbar.html.twig");
    }
}
