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

/* projects/sqlinjection/activities.twig */
class __TwigTemplate_e392662cf509e3f39073df0fbfcd233d extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "projects/sqlinjection.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("projects/sqlinjection.twig", "projects/sqlinjection/activities.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 3
        yield "\t<div class=\"row mt-3\">
\t\t<div class=\"col-md-12\">
\t\t\t";
        // line 5
        yield from         $this->loadTemplate("components/Table.twig", "projects/sqlinjection/activities.twig", 5)->unwrap()->yield(CoreExtension::merge($context, ["headers" => ["Activity ID", "Host Name", "IP Address", "Timestamp", "User Agents"], "rows" => (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source,         // line 7
($context["homeDetails"] ?? null), "activities", [], "any", false, false, false, 7)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null)]));
        // line 9
        yield "\t\t</div>
\t</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "projects/sqlinjection/activities.twig";
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
        return array (  65 => 9,  63 => 7,  62 => 5,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"projects/sqlinjection.twig\" %}
{% block content %}
\t<div class=\"row mt-3\">
\t\t<div class=\"col-md-12\">
\t\t\t{% include \"components/Table.twig\" with{
            headers: ['Activity ID', 'Host Name', 'IP Address', 'Timestamp', 'User Agents'],
            rows: homeDetails.activities[0]
        }%}
\t\t</div>
\t</div>
{% endblock %}
", "projects/sqlinjection/activities.twig", "C:\\xampp\\htdocs\\slim\\templates\\projects\\sqlinjection\\activities.twig");
    }
}
