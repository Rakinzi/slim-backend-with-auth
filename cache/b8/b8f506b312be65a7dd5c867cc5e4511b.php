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

/* components/Sidebar2.twig */
class __TwigTemplate_88d58081dd09c623901d9af1882863c0 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<style>
\t.sidebar {
\t\tposition: fixed;
\t\ttop: 0;
\t\tleft: 0;
\t\theight: 100vh;
\t\tz-index: 1030;
        width: 16%;
\t\toverflow-y: auto;
\t}
</style>

<div class=\"d-flex flex-column flex-shrink-0 p-3 bg-light text-dark sidebar\">
\t<a href=\"/\" class=\"d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none\">
\t\t<span class=\"fs-4\">";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("title", $context)) ? (Twig\Extension\CoreExtension::default(($context["title"] ?? null), "Sidebar")) : ("Sidebar")), "html", null, true);
        yield "</span>
\t</a>
\t<hr>
\t<ul class=\"nav nav-pills flex-column mb-auto\">
\t\t";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 20
            yield "\t\t\t<li class=\"nav-item\">
\t\t\t\t<a href=\"";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 21), "html", null, true);
            yield "\" class=\"nav-link text-dark ";
            yield (((($context["currentRoute"] ?? null) == CoreExtension::getAttribute($this->env, $this->source, $context["item"], "routeName", [], "any", false, false, false, 21))) ? ("active bg-secondary") : (""));
            yield "\">
\t\t\t\t\t";
            // line 22
            if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 22)) {
                // line 23
                yield "\t\t\t\t\t\t<i class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "icon", [], "any", false, false, false, 23), "html", null, true);
                yield "\"></i>
\t\t\t\t\t";
            }
            // line 25
            yield "\t\t\t\t\t";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 25), "html", null, true);
            yield "
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        yield "\t</ul>
\t<hr>
\t<div class=\"dropdown\">
\t\t<a href=\"#\" class=\"d-flex align-items-center text-dark text-decoration-none dropdown-toggle\" id=\"dropdownUser\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t<strong>";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", true, true, false, 33)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, false, 33), "User")) : ("User")), "html", null, true);
        yield "</strong>
\t\t</a>
\t\t<ul class=\"dropdown-menu dropdown-menu-dark text-small shadow\" aria-labelledby=\"dropdownUser\">
\t\t\t<li>
\t\t\t\t<a class=\"dropdown-item\" href=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "profileUrl", [], "any", true, true, false, 37)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "profileUrl", [], "any", false, false, false, 37), "#")) : ("#")), "html", null, true);
        yield "\">Profile</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a class=\"dropdown-item\" href=\"";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "settingsUrl", [], "any", true, true, false, 40)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "settingsUrl", [], "any", false, false, false, 40), "#")) : ("#")), "html", null, true);
        yield "\">Settings</a>
\t\t\t</li>
\t\t\t<li><hr class=\"dropdown-divider\"></li>
\t\t\t<li>
\t\t\t\t<a class=\"dropdown-item\" href=\"";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "logoutUrl", [], "any", true, true, false, 44)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "logoutUrl", [], "any", false, false, false, 44), "#")) : ("#")), "html", null, true);
        yield "\">Sign out</a>
\t\t\t</li>
\t\t</ul>
\t</div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/Sidebar2.twig";
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
        return array (  123 => 44,  116 => 40,  110 => 37,  103 => 33,  97 => 29,  86 => 25,  80 => 23,  78 => 22,  72 => 21,  69 => 20,  65 => 19,  58 => 15,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<style>
\t.sidebar {
\t\tposition: fixed;
\t\ttop: 0;
\t\tleft: 0;
\t\theight: 100vh;
\t\tz-index: 1030;
        width: 16%;
\t\toverflow-y: auto;
\t}
</style>

<div class=\"d-flex flex-column flex-shrink-0 p-3 bg-light text-dark sidebar\">
\t<a href=\"/\" class=\"d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none\">
\t\t<span class=\"fs-4\">{{ title|default('Sidebar') }}</span>
\t</a>
\t<hr>
\t<ul class=\"nav nav-pills flex-column mb-auto\">
\t\t{% for item in items %}
\t\t\t<li class=\"nav-item\">
\t\t\t\t<a href=\"{{ item.url }}\" class=\"nav-link text-dark {{ currentRoute == item.routeName ? 'active bg-secondary' : '' }}\">
\t\t\t\t\t{% if item.icon %}
\t\t\t\t\t\t<i class=\"{{ item.icon }}\"></i>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{{ item.label }}
\t\t\t\t</a>
\t\t\t</li>
\t\t{% endfor %}
\t</ul>
\t<hr>
\t<div class=\"dropdown\">
\t\t<a href=\"#\" class=\"d-flex align-items-center text-dark text-decoration-none dropdown-toggle\" id=\"dropdownUser\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t<strong>{{ user.name|default('User') }}</strong>
\t\t</a>
\t\t<ul class=\"dropdown-menu dropdown-menu-dark text-small shadow\" aria-labelledby=\"dropdownUser\">
\t\t\t<li>
\t\t\t\t<a class=\"dropdown-item\" href=\"{{ user.profileUrl|default('#') }}\">Profile</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a class=\"dropdown-item\" href=\"{{ user.settingsUrl|default('#') }}\">Settings</a>
\t\t\t</li>
\t\t\t<li><hr class=\"dropdown-divider\"></li>
\t\t\t<li>
\t\t\t\t<a class=\"dropdown-item\" href=\"{{ user.logoutUrl|default('#') }}\">Sign out</a>
\t\t\t</li>
\t\t</ul>
\t</div>
</div>
", "components/Sidebar2.twig", "C:\\xampp\\htdocs\\slim\\templates\\components\\Sidebar2.twig");
    }
}
