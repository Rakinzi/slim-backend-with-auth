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

/* projects/sqlinjection/dashboard.twig */
class __TwigTemplate_46d2953503095d5749f5d56a04640f84 extends Template
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
        $this->parent = $this->loadTemplate("projects/sqlinjection.twig", "projects/sqlinjection/dashboard.twig", 1);
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
\t\t<div class=\"col-md-6\">
\t\t\t";
        // line 5
        yield from         $this->loadTemplate("projects/sqlinjection/dashboard.twig", "projects/sqlinjection/dashboard.twig", 5, "696467586")->unwrap()->yield($context);
        // line 18
        yield "\t\t</div>
\t\t<div class=\"col-md-6\">
\t\t\t";
        // line 20
        yield from         $this->loadTemplate("projects/sqlinjection/dashboard.twig", "projects/sqlinjection/dashboard.twig", 20, "1987998358")->unwrap()->yield($context);
        // line 33
        yield "\t\t</div>
\t</div>
    \t<div class=\"row mt-3\">
\t\t<div class=\"col-md-6\">
\t\t\t";
        // line 37
        yield from         $this->loadTemplate("projects/sqlinjection/dashboard.twig", "projects/sqlinjection/dashboard.twig", 37, "1379106705")->unwrap()->yield($context);
        // line 50
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
        return "projects/sqlinjection/dashboard.twig";
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
        return array (  78 => 50,  76 => 37,  70 => 33,  68 => 20,  64 => 18,  62 => 5,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"projects/sqlinjection.twig\" %}
{% block content %}
\t<div class=\"row mt-3\">
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tBlocked Users
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.blocked_users[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tNumber of Payloads
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.payloads[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t</div>
    \t<div class=\"row mt-3\">
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tActivities
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.activities[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t</div>
{% endblock %}
", "projects/sqlinjection/dashboard.twig", "C:\\xampp\\htdocs\\slim\\templates\\projects\\sqlinjection\\dashboard.twig");
    }
}


/* projects/sqlinjection/dashboard.twig */
class __TwigTemplate_46d2953503095d5749f5d56a04640f84___696467586 extends Template
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
            'cardStyle' => [$this, 'block_cardStyle'],
            'card_title' => [$this, 'block_card_title'],
            'card_body' => [$this, 'block_card_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 5
        return "components/Card.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("components/Card.twig", "projects/sqlinjection/dashboard.twig", 5);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_cardStyle(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 7
        yield "\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "\t\t\t\t\tBlocked Users
\t\t\t\t";
        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 13
        yield "\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["homeDetails"] ?? null), "blocked_users", [], "any", false, false, false, 14)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null)), "html", null, true);
        yield "
\t\t\t\t\t</div>
\t\t\t\t";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "projects/sqlinjection/dashboard.twig";
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
        return array (  239 => 14,  236 => 13,  229 => 12,  223 => 10,  216 => 9,  210 => 7,  203 => 6,  192 => 5,  78 => 50,  76 => 37,  70 => 33,  68 => 20,  64 => 18,  62 => 5,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"projects/sqlinjection.twig\" %}
{% block content %}
\t<div class=\"row mt-3\">
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tBlocked Users
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.blocked_users[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tNumber of Payloads
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.payloads[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t</div>
    \t<div class=\"row mt-3\">
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tActivities
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.activities[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t</div>
{% endblock %}
", "projects/sqlinjection/dashboard.twig", "C:\\xampp\\htdocs\\slim\\templates\\projects\\sqlinjection\\dashboard.twig");
    }
}


/* projects/sqlinjection/dashboard.twig */
class __TwigTemplate_46d2953503095d5749f5d56a04640f84___1987998358 extends Template
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
            'cardStyle' => [$this, 'block_cardStyle'],
            'card_title' => [$this, 'block_card_title'],
            'card_body' => [$this, 'block_card_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 20
        return "components/Card.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("components/Card.twig", "projects/sqlinjection/dashboard.twig", 20);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 21
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_cardStyle(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 22
        yield "\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t";
        yield from [];
    }

    // line 24
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 25
        yield "\t\t\t\t\tNumber of Payloads
\t\t\t\t";
        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (($__internal_compile_1 = CoreExtension::getAttribute($this->env, $this->source, ($context["homeDetails"] ?? null), "payloads", [], "any", false, false, false, 29)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[0] ?? null) : null)), "html", null, true);
        yield "
\t\t\t\t\t</div>
\t\t\t\t";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "projects/sqlinjection/dashboard.twig";
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
        return array (  401 => 29,  398 => 28,  391 => 27,  385 => 25,  378 => 24,  372 => 22,  365 => 21,  354 => 20,  239 => 14,  236 => 13,  229 => 12,  223 => 10,  216 => 9,  210 => 7,  203 => 6,  192 => 5,  78 => 50,  76 => 37,  70 => 33,  68 => 20,  64 => 18,  62 => 5,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"projects/sqlinjection.twig\" %}
{% block content %}
\t<div class=\"row mt-3\">
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tBlocked Users
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.blocked_users[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tNumber of Payloads
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.payloads[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t</div>
    \t<div class=\"row mt-3\">
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tActivities
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.activities[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t</div>
{% endblock %}
", "projects/sqlinjection/dashboard.twig", "C:\\xampp\\htdocs\\slim\\templates\\projects\\sqlinjection\\dashboard.twig");
    }
}


/* projects/sqlinjection/dashboard.twig */
class __TwigTemplate_46d2953503095d5749f5d56a04640f84___1379106705 extends Template
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
            'cardStyle' => [$this, 'block_cardStyle'],
            'card_title' => [$this, 'block_card_title'],
            'card_body' => [$this, 'block_card_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 37
        return "components/Card.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("components/Card.twig", "projects/sqlinjection/dashboard.twig", 37);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_cardStyle(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 39
        yield "\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t";
        yield from [];
    }

    // line 41
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 42
        yield "\t\t\t\t\tActivities
\t\t\t\t";
        yield from [];
    }

    // line 44
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_card_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 45
        yield "\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (($__internal_compile_2 = CoreExtension::getAttribute($this->env, $this->source, ($context["homeDetails"] ?? null), "activities", [], "any", false, false, false, 46)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[0] ?? null) : null)), "html", null, true);
        yield "
\t\t\t\t\t</div>
\t\t\t\t";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "projects/sqlinjection/dashboard.twig";
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
        return array (  563 => 46,  560 => 45,  553 => 44,  547 => 42,  540 => 41,  534 => 39,  527 => 38,  516 => 37,  401 => 29,  398 => 28,  391 => 27,  385 => 25,  378 => 24,  372 => 22,  365 => 21,  354 => 20,  239 => 14,  236 => 13,  229 => 12,  223 => 10,  216 => 9,  210 => 7,  203 => 6,  192 => 5,  78 => 50,  76 => 37,  70 => 33,  68 => 20,  64 => 18,  62 => 5,  58 => 3,  51 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"projects/sqlinjection.twig\" %}
{% block content %}
\t<div class=\"row mt-3\">
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tBlocked Users
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.blocked_users[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tNumber of Payloads
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.payloads[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t</div>
    \t<div class=\"row mt-3\">
\t\t<div class=\"col-md-6\">
\t\t\t{% embed \"components/Card.twig\" %}
\t\t\t\t{% block cardStyle %}
\t\t\t\t\tstyle=\"box-shadow: -2px 1px 1px 1px;\"
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_title %}
\t\t\t\t\tActivities
\t\t\t\t{% endblock %}
\t\t\t\t{% block card_body %}
\t\t\t\t\t<div class=\"text-center\" style=\"font-size: xx-large;\">
\t\t\t\t\t\t{{homeDetails.activities[0]|length}}
\t\t\t\t\t</div>
\t\t\t\t{% endblock %}
\t\t\t{% endembed %}
\t\t</div>
\t</div>
{% endblock %}
", "projects/sqlinjection/dashboard.twig", "C:\\xampp\\htdocs\\slim\\templates\\projects\\sqlinjection\\dashboard.twig");
    }
}
