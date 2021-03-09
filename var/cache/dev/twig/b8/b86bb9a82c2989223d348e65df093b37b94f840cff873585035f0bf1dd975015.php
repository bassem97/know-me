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

/* event/participants.html.twig */
class __TwigTemplate_db57b1808d889a881cc11e6ce74079293a34c72c3deb10447bd615224d5514ef extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "event/participants.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "event/participants.html.twig"));

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
\t\t<h1>Event</h1>
\t\t<table border=\"1\">
\t\t\t<tr>

\t\t\t\t<th>Listes participants</th>
\t\t\t\t<th>Email</th>

\t\t\t</tr>
\t\t\t";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 18, $this->source); })()), "event", [], "any", false, false, false, 18));
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 19
            echo "\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["u"], "users", [], "any", false, false, false, 19));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 20
                echo "\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["allusers"]) || array_key_exists("allusers", $context) ? $context["allusers"] : (function () { throw new RuntimeError('Variable "allusers" does not exist.', 20, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["x"]) {
                    // line 21
                    echo "\t\t\t\t\t\t";
                    if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["x"], "id", [], "any", false, false, false, 21), twig_get_attribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 21)))) {
                        // line 22
                        echo "
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>";
                        // line 24
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 24), "html", null, true);
                        echo "</td>

\t\t\t\t\t\t\t\t<td>";
                        // line 26
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["x"], "email", [], "any", false, false, false, 26), "html", null, true);
                        echo "</td>

\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
                    }
                    // line 30
                    echo "
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['x'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 32
                echo "
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['u'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "\t\t</table>
\t</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "event/participants.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 35,  109 => 34,  102 => 32,  95 => 30,  88 => 26,  83 => 24,  79 => 22,  76 => 21,  71 => 20,  66 => 19,  62 => 18,  43 => 1,);
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
\t\t<h1>Event</h1>
\t\t<table border=\"1\">
\t\t\t<tr>

\t\t\t\t<th>Listes participants</th>
\t\t\t\t<th>Email</th>

\t\t\t</tr>
\t\t\t{% for u in user.event %}
\t\t\t\t{% for t in u.users %}
\t\t\t\t\t{% for x in allusers %}
\t\t\t\t\t\t{% if x.id == t.id %}

\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>{{ t.id }}</td>

\t\t\t\t\t\t\t\t<td>{{ x.email }}</td>

\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t{% endif %}

\t\t\t\t\t{% endfor %}

\t\t\t\t{% endfor %}
\t\t\t{% endfor %}
\t\t</table>
\t</body>
</html>
", "event/participants.html.twig", "D:\\CoursEsprit\\cours3\\PIDEV\\know-me\\templates\\event\\participants.html.twig");
    }
}
