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

/* projects/sqlinjection.twig */
class __TwigTemplate_8c9ee08162949c87ab0c07a774f39cd7 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'styles' => [$this, 'block_styles'],
            'sidebar' => [$this, 'block_sidebar'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layouts/portal.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layouts/portal.twig", "projects/sqlinjection.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Projects
";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "\t<link rel=\"stylesheet\" href=\"/assets/css/features.css\">
";
        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_sidebar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 9
        yield "\t";
        yield from         $this->loadTemplate("components/BreadCrumb.twig", "projects/sqlinjection.twig", 9)->unwrap()->yield(CoreExtension::merge($context, ["crumbs" => [["label" => "Home", "url" => "/"], ["label" => "Library", "url" => "/library"], ["label" => "Data", "url" => null]]]));
        // line 16
        yield "
\t<button class=\"btn btn-dark d-md-none\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#sidebar\" aria-expanded=\"false\" aria-controls=\"sidebar\">
\t\t☰
\t</button>
\t<div id=\"sidebar\" class=\"collapse d-md-block\">
\t\t";
        // line 21
        yield from         $this->loadTemplate("components/Sidebar2.twig", "projects/sqlinjection.twig", 21)->unwrap()->yield(CoreExtension::merge($context, ["title" => CoreExtension::getAttribute($this->env, $this->source,         // line 22
($context["homeDetails"] ?? null), "project_name", [], "any", false, false, false, 22), "items" => [["label" => "Dashboard", "url" => $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("sqli.dashboard"), "icon" => "bi bi-house", "routeName" => "sqli.dashboard"], ["label" => "Activities", "url" => $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("sqli.activities"), "icon" => "bi bi-basket", "routeName" => "sqli.activities"], ["label" => "Payloads", "url" => $this->env->getRuntime('Slim\Views\TwigRuntimeExtension')->urlFor("sqli.payloads"), "icon" => "bi bi-box", "routeName" => "sqli.payloads"], ["label" => "Customers", "url" => "/customers", "icon" => "bi bi-people", "routeName" => "sqli.customers"]], "user" => ["name" => CoreExtension::getAttribute($this->env, $this->source,         // line 30
($context["user"] ?? null), "name", [], "any", false, false, false, 30), "profileUrl" => "/profile", "settingsUrl" => "/settings", "logoutUrl" => "/logout"]]));
        // line 36
        yield "\t</div>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "projects/sqlinjection.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  99 => 36,  97 => 30,  96 => 22,  95 => 21,  88 => 16,  85 => 9,  78 => 8,  72 => 6,  65 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"layouts/portal.twig\" %}

{% block title %}Projects
{% endblock %}
{% block styles %}
\t<link rel=\"stylesheet\" href=\"/assets/css/features.css\">
{% endblock %}
{% block sidebar %}
\t{% include 'components/BreadCrumb.twig' with {
  crumbs: [
    { label: 'Home', url: '/' },
    { label: 'Library', url: '/library' },
    { label: 'Data', url: null }
  ]
} %}

\t<button class=\"btn btn-dark d-md-none\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#sidebar\" aria-expanded=\"false\" aria-controls=\"sidebar\">
\t\t☰
\t</button>
\t<div id=\"sidebar\" class=\"collapse d-md-block\">
\t\t{% include 'components/Sidebar2.twig' with {
  title: homeDetails.project_name,
  items: [
    { label: 'Dashboard', url: url_for('sqli.dashboard'), icon: 'bi bi-house', routeName: 'sqli.dashboard' },
    { label: 'Activities', url: url_for('sqli.activities'), icon: 'bi bi-basket', routeName: 'sqli.activities' },
    { label: 'Payloads', url: url_for('sqli.payloads'), icon: 'bi bi-box', routeName: 'sqli.payloads' },
    { label: 'Customers', url: '/customers', icon: 'bi bi-people', routeName: 'sqli.customers' }
  ],
  user: {
    name: user.name,
    profileUrl: '/profile',
    settingsUrl: '/settings',
    logoutUrl: '/logout'
  }
} %}
\t</div>

{% endblock %}
", "projects/sqlinjection.twig", "C:\\xampp\\htdocs\\slim\\templates\\projects\\sqlinjection.twig");
    }
}
