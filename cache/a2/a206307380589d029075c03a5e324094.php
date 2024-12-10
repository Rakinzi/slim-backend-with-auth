<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* layouts/portal.twig */
class __TwigTemplate_d1d6404ae19b68cd5273f5de6dfb8eca extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'styles' => [$this, 'block_styles'],
            'sidebar' => [$this, 'block_sidebar'],
            'content' => [$this, 'block_content'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html>
\t<head lang=\"en\">
\t\t<title>
\t\t\t";
        // line 5
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 6
        yield "\t\t</title>
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"author\" content=\"Rakinzi L Silver\">
\t\t<meta charset=\"utf-8\">
\t\t<link rel=\"stylesheet\" href=\"/assets/css/style.css\">
\t\t<style>
\t\t\tbody {
\t\t\t\tfont-family: 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif !important;
\t\t\t}
\t\t</style>
\t\t<link rel=\"stylesheet\" href=\"/assets/css/bootstrap.min.css\"/> ";
        // line 16
        yield from $this->unwrap()->yieldBlock('styles', $context, $blocks);
        // line 17
        yield "
\t\t</head>
\t\t<body style=\"background-color: #f2f2f2;\">
\t\t\t<div class=\"row\" >
\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t";
        // line 22
        yield from $this->unwrap()->yieldBlock('sidebar', $context, $blocks);
        // line 23
        yield "\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t<main>
\t\t\t\t\t\t";
        // line 26
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 27
        yield "\t\t\t\t\t</main>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<script src=\"/assets/js/app.js\" defer></script>
\t\t\t<script src=\"/assets/js/jquery.min.js\" defer></script>
\t\t\t<script src=\"/assets/js/bootstrap.bundle.js\" defer></script>

\t\t\t<footer>
\t\t\t\t";
        // line 35
        yield from $this->unwrap()->yieldBlock('scripts', $context, $blocks);
        // line 36
        yield "\t\t\t</footer>
\t\t</body>
\t</html>
";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 16
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 22
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_sidebar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 26
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 35
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts/portal.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  145 => 35,  135 => 26,  125 => 22,  115 => 16,  105 => 5,  97 => 36,  95 => 35,  85 => 27,  83 => 26,  78 => 23,  76 => 22,  69 => 17,  67 => 16,  55 => 6,  53 => 5,  47 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
\t<head lang=\"en\">
\t\t<title>
\t\t\t{% block title %}{% endblock %}
\t\t</title>
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"author\" content=\"Rakinzi L Silver\">
\t\t<meta charset=\"utf-8\">
\t\t<link rel=\"stylesheet\" href=\"/assets/css/style.css\">
\t\t<style>
\t\t\tbody {
\t\t\t\tfont-family: 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif !important;
\t\t\t}
\t\t</style>
\t\t<link rel=\"stylesheet\" href=\"/assets/css/bootstrap.min.css\"/> {% block styles %}{% endblock %}

\t\t</head>
\t\t<body style=\"background-color: #f2f2f2;\">
\t\t\t<div class=\"row\" >
\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t{% block sidebar %}{% endblock %}
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t<main>
\t\t\t\t\t\t{% block content %}{% endblock %}
\t\t\t\t\t</main>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<script src=\"/assets/js/app.js\" defer></script>
\t\t\t<script src=\"/assets/js/jquery.min.js\" defer></script>
\t\t\t<script src=\"/assets/js/bootstrap.bundle.js\" defer></script>

\t\t\t<footer>
\t\t\t\t{% block scripts %}{% endblock %}
\t\t\t</footer>
\t\t</body>
\t</html>
", "layouts/portal.twig", "C:\\xampp\\htdocs\\slim\\templates\\layouts\\portal.twig");
    }
}
