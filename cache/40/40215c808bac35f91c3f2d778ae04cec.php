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

/* components/Card.twig */
class __TwigTemplate_ffc1c38b93e8589e41e61d9eac6c8d43 extends Template
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
            'cardStyle' => [$this, 'block_cardStyle'],
            'card_title' => [$this, 'block_card_title'],
            'card_body' => [$this, 'block_card_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<div class=\"card\" ";
        yield from $this->unwrap()->yieldBlock('cardStyle', $context, $blocks);
        yield ">
\t<div class=\"card-header text-center\" style=\"background-color: white;\">
\t\t<h1 class=\"h1\">";
        // line 3
        yield from $this->unwrap()->yieldBlock('card_title', $context, $blocks);
        yield "</h1>
\t</div>
\t<div class=\"card-body\">
        ";
        // line 6
        yield from $this->unwrap()->yieldBlock('card_body', $context, $blocks);
        // line 7
        yield "\t</div>
</div>
";
        yield from [];
    }

    // line 1
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_cardStyle(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/Card.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  86 => 6,  76 => 3,  66 => 1,  59 => 7,  57 => 6,  51 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"card\" {% block cardStyle %}{% endblock %}>
\t<div class=\"card-header text-center\" style=\"background-color: white;\">
\t\t<h1 class=\"h1\">{% block card_title %}{% endblock %}</h1>
\t</div>
\t<div class=\"card-body\">
        {% block card_body %}{% endblock %}
\t</div>
</div>
", "components/Card.twig", "C:\\xampp\\htdocs\\slim\\templates\\components\\Card.twig");
    }
}
