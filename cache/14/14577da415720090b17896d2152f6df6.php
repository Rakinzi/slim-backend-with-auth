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

/* projects/sqlinjection/payloads.twig */
class __TwigTemplate_6df5fb359ba0bd76a7d599cf9528b879 extends Template
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
        // line 2
        return "projects/sqlinjection.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("projects/sqlinjection.twig", "projects/sqlinjection/payloads.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "\t<div class=\"row mt-3\">
\t\t<div class=\"col-md-12\">
\t\t\t";
        // line 6
        yield from         $this->loadTemplate("components/Table.twig", "projects/sqlinjection/payloads.twig", 6)->unwrap()->yield(CoreExtension::merge($context, ["headers" => ["Activity ID", "SQLi ID", "SQLi Statements"], "rows" => (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source,         // line 8
($context["homeDetails"] ?? null), "payloads", [], "any", false, false, false, 8)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null)]));
        // line 10
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
        return "projects/sqlinjection/payloads.twig";
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
        return array (  65 => 10,  63 => 8,  62 => 6,  58 => 4,  51 => 3,  40 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
{% extends \"projects/sqlinjection.twig\" %}
{% block content %}
\t<div class=\"row mt-3\">
\t\t<div class=\"col-md-12\">
\t\t\t{% include \"components/Table.twig\" with{
            headers: ['Activity ID','SQLi ID','SQLi Statements'],
            rows: homeDetails.payloads[0]
        }%}
\t\t</div>
\t</div>
{% endblock %}
", "projects/sqlinjection/payloads.twig", "C:\\xampp\\htdocs\\slim\\templates\\projects\\sqlinjection\\payloads.twig");
    }
}
