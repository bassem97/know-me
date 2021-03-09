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

/* event/AfficheEvents.html.twig */
class __TwigTemplate_26e52a42a85ec637d718472b42575a113608d834c6de493e33897c8e688e048a extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "event/AfficheEvents.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "event/AfficheEvents.html.twig"));

        // line 1
        echo "<!doctype html>
<html lang=\"en\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
\t\t<title>Document</title>
\t</head>
\t<body>
\t\t<h1>Liste des events</h1>
\t\t<table border=\"1\">
\t\t\t<tr>

\t\t\t\t<th>nom</th>
\t\t\t\t<th>Description</th>
\t\t\t\t<th>Date</th>
\t\t\t\t<th>Delete</th>
\t\t\t\t<th>Update</th>
\t\t\t</tr>
\t\t\t";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 21
            echo "\t\t\t\t<tr>
\t\t\t\t\t<td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "name", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
\t\t\t\t\t<td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 23), "html", null, true);
            echo "</td>
\t\t\t\t\t<td><img src=\"";
            // line 24
            echo twig_escape_filter($this->env, ($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/") . twig_get_attribute($this->env, $this->source, $context["t"], "image", [], "any", false, false, false, 24)), "html", null, true);
            echo "\" alt=\"\" style=\"width: 50px !important;height: 50px !important\"></td>

\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete-event", ["id" => twig_get_attribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 27)]), "html", null, true);
            echo "\">Delete</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("update", ["id" => twig_get_attribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 30)]), "html", null, true);
            echo "\">Update</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("participate", ["id" => twig_get_attribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 33)]), "html", null, true);
            echo "\">Participer</a>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "\t\t</table>
\t</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "event/AfficheEvents.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 37,  97 => 33,  91 => 30,  85 => 27,  79 => 24,  75 => 23,  71 => 22,  68 => 21,  64 => 20,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"en\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
\t\t<title>Document</title>
\t</head>
\t<body>
\t\t<h1>Liste des events</h1>
\t\t<table border=\"1\">
\t\t\t<tr>

\t\t\t\t<th>nom</th>
\t\t\t\t<th>Description</th>
\t\t\t\t<th>Date</th>
\t\t\t\t<th>Delete</th>
\t\t\t\t<th>Update</th>
\t\t\t</tr>
\t\t\t{% for t in event %}
\t\t\t\t<tr>
\t\t\t\t\t<td>{{ t.name }}</td>
\t\t\t\t\t<td>{{ t.description }}</td>
\t\t\t\t\t<td><img src=\"{{ asset('img/') ~ t.image }}\" alt=\"\" style=\"width: 50px !important;height: 50px !important\"></td>

\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"{{ path('delete-event',{'id':t.id}) }}\">Delete</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"{{ path('update',{'id':t.id}) }}\">Update</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"{{ path('participate',{'id':t.id}) }}\">Participer</a>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t{% endfor %}
\t\t</table>
\t</body>
</html>
", "event/AfficheEvents.html.twig", "D:\\CoursEsprit\\cours3\\know-me\\templates\\event\\AfficheEvents.html.twig");
    }
}
