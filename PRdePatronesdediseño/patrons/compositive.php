<?php
 include '../header.php';
?>
<link rel="stylesheet" href="../estilos.css">
<style>
    .cm-comment{
    color: green;
}
.cm-metodo{
    color: blue;
}
.cm-clase{
    color: blueviolet;
}
.cm-php{
    color: red;
}
.cm-variable{
    color: orange;
}
</style>
<main>
<div class="container-fluid text-center m-3 ">
    <div class="container">
        <h1>Compositive</h1>
        <div class="container text-start ps-5" mb-3>
            <p>El composite es un patron de diseño estructural que permite en componer objetos en estructuras de arbol y trabajar con esas estructuras como si fuera objetos individuales.</p>
            <p>Es una solucion muy popular para la mayoria de problemas que requieren la creacion de una estructura de arbol. Una gran caracteristica del composite es que tiene la capacidad para poder ejecutarmetodos de forma recursiva por toda la estructura de arbol y recapitular los resultados.</p>
            <div class="card text-center m-5" >
                <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="text-center">Ventajas</h5>
                    </div>
                    <div class="col">
                        <h5 class="text-center">Desventajas</h5>
                    </div>
                </div>
                </div>
                
                <div class="card-body ">
                    <div class="row">
                        <div class="col">
                            <ul class="text-start">
                                <li>Puedes trabajar con estructurla de arbol complejas que utiliza el polimorfismo y la recursion en tu favor</li>
                                <li>Permite un enfoque de abstraccion y encapsulamiento</li>
                                <li>Puedes introducir nuevos tipos de elemento en la apliccacion sin descomponer el codigo existente</li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="text-start">
                                <li>Puede resultar complicado proporcionar una interfaz comun para clases cuya funcionalidad difiere demasiado.</li>
                                <li>Si se usan demasiados objetos compuestos, puede haber un consumo excesivo de memoria y procesamiento innecesario.</li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                    
                </div>
            <div class="text-center">
            <img src="../images/composite.png" alt="" class="img-fluid">
        </div>
            
        </div>
        <div  class="ejemplo text-start bg-secondary-subtle p-5">
            <h4>Ejemplo:</h4>
            <pre class="code cm-s-default CodeMirror" lang="php"><span class="cm-operator">&lt;?</span><span class="cm-variable">php</span>

<span class="cm-keyword">namespace</span> <span class="cm-def">RefactoringGuru</span><span class="cm-def">\Composite</span><span class="cm-def">\Conceptual</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The base Component class declares common operations for both simple and</span>
 <span class="cm-comment">* complex objects of a composition.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">abstract</span> <span class="cm-keyword">class</span> <span class="cm-def">Component</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* @var Component|null</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">protected</span> <span class="cm-variable-2">$parent</span>;

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Optionally, the base Component can declare an interface for setting and</span>
     <span class="cm-comment">* accessing a parent of the component in a tree structure. It can also</span>
     <span class="cm-comment">* provide some default implementation for these methods.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">setParent</span>(<span class="cm-operator">?</span><span class="cm-variable">Component</span> <span class="cm-variable-2">$parent</span>)
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-keyword">parent</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$parent</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">getParent</span>(): <span class="cm-variable">Component</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-keyword">parent</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* In some cases, it would be beneficial to define the child-management</span>
     <span class="cm-comment">* operations right in the base Component class. This way, you won't need to</span>
     <span class="cm-comment">* expose any concrete component classes to the client code, even during the</span>
     <span class="cm-comment">* object tree assembly. The downside is that these methods will be empty</span>
     <span class="cm-comment">* for the leaf-level components.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">add</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span> { }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">remove</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span> { }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* You can provide a method that lets the client code figure out whether a</span>
     <span class="cm-comment">* component can bear children.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">isComposite</span>(): <span class="cm-variable">bool</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-atom">false</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The base Component may implement some default behavior or leave it to</span>
     <span class="cm-comment">* concrete classes (by declaring the method containing the behavior as</span>
     <span class="cm-comment">* "abstract").</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">abstract</span> <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">operation</span>(): <span class="cm-variable">string</span>;
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Leaf class represents the end objects of a composition. A leaf can't have</span>
 <span class="cm-comment">* any children.</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* Usually, it's the Leaf objects that do the actual work, whereas Composite</span>
 <span class="cm-comment">* objects only delegate to their sub-components.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">Leaf</span> <span class="cm-keyword">extends</span> <span class="cm-variable">Component</span>
{
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">operation</span>(): <span class="cm-variable">string</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-string">"</span><span class="cm-string">Leaf"</span>;
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Composite class represents the complex components that may have children.</span>
 <span class="cm-comment">* Usually, the Composite objects delegate the actual work to their children and</span>
 <span class="cm-comment">* then "sum-up" the result.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">Composite</span> <span class="cm-keyword">extends</span> <span class="cm-variable">Component</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* @var \SplObjectStorage</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">protected</span> <span class="cm-variable-2">$children</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>()
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">\SplObjectStorage</span>();
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* A composite object can add or remove other components (both simple or</span>
     <span class="cm-comment">* complex) to or from its child list.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">add</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span><span class="cm-operator">-&gt;</span><span class="cm-variable">attach</span>(<span class="cm-variable-2">$component</span>);
        <span class="cm-variable-2">$component</span><span class="cm-operator">-&gt;</span><span class="cm-variable">setParent</span>(<span class="cm-variable-2">$this</span>);
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">remove</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span><span class="cm-operator">-&gt;</span><span class="cm-variable">detach</span>(<span class="cm-variable-2">$component</span>);
        <span class="cm-variable-2">$component</span><span class="cm-operator">-&gt;</span><span class="cm-variable">setParent</span>(<span class="cm-atom">null</span>);
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">isComposite</span>(): <span class="cm-variable">bool</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-atom">true</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The Composite executes its primary logic in a particular way. It</span>
     <span class="cm-comment">* traverses recursively through all its children, collecting and summing</span>
     <span class="cm-comment">* their results. Since the composite's children pass these calls to their</span>
     <span class="cm-comment">* children and so forth, the whole object tree is traversed as a result.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">operation</span>(): <span class="cm-variable">string</span>
    {
        <span class="cm-variable-2">$results</span> <span class="cm-operator">=</span> [];
        <span class="cm-keyword">foreach</span> (<span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span> <span class="cm-keyword">as</span> <span class="cm-variable-2">$child</span>) {
            <span class="cm-variable-2">$results</span>[] <span class="cm-operator">=</span> <span class="cm-variable-2">$child</span><span class="cm-operator">-&gt;</span><span class="cm-variable">operation</span>();
        }

        <span class="cm-keyword">return</span> <span class="cm-string">"</span><span class="cm-string">Branch("</span> . <span class="cm-builtin">implode</span>(<span class="cm-string">"</span><span class="cm-string">+"</span>, <span class="cm-variable-2">$results</span>) . <span class="cm-string">"</span><span class="cm-string">)"</span>;
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The client code works with all of the components via the base interface.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">function</span> <span class="cm-def">clientCode</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>)
{
    <span class="cm-comment">// ...</span>

    <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">RESULT: "</span> . <span class="cm-variable-2">$component</span><span class="cm-operator">-&gt;</span><span class="cm-variable">operation</span>();

    <span class="cm-comment">// ...</span>
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* This way the client code can support the simple leaf components...</span>
 <span class="cm-comment">*/</span>
<span class="cm-variable-2">$simple</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>();
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: I've got a simple component:\n"</span>;
<span class="cm-variable">clientCode</span>(<span class="cm-variable-2">$simple</span>);
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">\n\n"</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* ...as well as the complex composites.</span>
 <span class="cm-comment">*/</span>
<span class="cm-variable-2">$tree</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Composite</span>();
<span class="cm-variable-2">$branch1</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Composite</span>();
<span class="cm-variable-2">$branch1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>());
<span class="cm-variable-2">$branch1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>());
<span class="cm-variable-2">$branch2</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Composite</span>();
<span class="cm-variable-2">$branch2</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>());
<span class="cm-variable-2">$tree</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-variable-2">$branch1</span>);
<span class="cm-variable-2">$tree</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-variable-2">$branch2</span>);
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: Now I've got a composite tree:\n"</span>;
<span class="cm-variable">clientCode</span>(<span class="cm-variable-2">$tree</span>);
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">\n\n"</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* Thanks to the fact that the child-management operations are declared in the</span>
 <span class="cm-comment">* base Component class, the client code can work with any component, simple or</span>
 <span class="cm-comment">* complex, without depending on their concrete classes.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">function</span> <span class="cm-def">clientCode2</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component1</span>, <span class="cm-variable">Component</span> <span class="cm-variable-2">$component2</span>)
{
    <span class="cm-comment">// ...</span>

    <span class="cm-keyword">if</span> (<span class="cm-variable-2">$component1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">isComposite</span>()) {
        <span class="cm-variable-2">$component1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-variable-2">$component2</span>);
    }
    <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">RESULT: "</span> . <span class="cm-variable-2">$component1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">operation</span>();

    <span class="cm-comment">// ...</span>
}

<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: I don't need to check the components classes even when managing the tree:\n"</span>;
<span class="cm-variable">clientCode2</span>(<span class="cm-variable-2">$tree</span>, <span class="cm-variable-2">$simple</span>);
</pre><pre class="code cm-s-default CodeMirror" lang="php"><span class="cm-operator">&lt;?</span><span class="cm-variable">php</span>

<span class="cm-keyword">namespace</span> <span class="cm-def">RefactoringGuru</span><span class="cm-def">\Composite</span><span class="cm-def">\Conceptual</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The base Component class declares common operations for both simple and</span>
 <span class="cm-comment">* complex objects of a composition.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">abstract</span> <span class="cm-keyword">class</span> <span class="cm-def">Component</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* @var Component|null</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">protected</span> <span class="cm-variable-2">$parent</span>;

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Optionally, the base Component can declare an interface for setting and</span>
     <span class="cm-comment">* accessing a parent of the component in a tree structure. It can also</span>
     <span class="cm-comment">* provide some default implementation for these methods.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">setParent</span>(<span class="cm-operator">?</span><span class="cm-variable">Component</span> <span class="cm-variable-2">$parent</span>)
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-keyword">parent</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$parent</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">getParent</span>(): <span class="cm-variable">Component</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-keyword">parent</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* In some cases, it would be beneficial to define the child-management</span>
     <span class="cm-comment">* operations right in the base Component class. This way, you won't need to</span>
     <span class="cm-comment">* expose any concrete component classes to the client code, even during the</span>
     <span class="cm-comment">* object tree assembly. The downside is that these methods will be empty</span>
     <span class="cm-comment">* for the leaf-level components.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">add</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span> { }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">remove</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span> { }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* You can provide a method that lets the client code figure out whether a</span>
     <span class="cm-comment">* component can bear children.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">isComposite</span>(): <span class="cm-variable">bool</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-atom">false</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The base Component may implement some default behavior or leave it to</span>
     <span class="cm-comment">* concrete classes (by declaring the method containing the behavior as</span>
     <span class="cm-comment">* "abstract").</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">abstract</span> <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">operation</span>(): <span class="cm-variable">string</span>;
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Leaf class represents the end objects of a composition. A leaf can't have</span>
 <span class="cm-comment">* any children.</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* Usually, it's the Leaf objects that do the actual work, whereas Composite</span>
 <span class="cm-comment">* objects only delegate to their sub-components.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">Leaf</span> <span class="cm-keyword">extends</span> <span class="cm-variable">Component</span>
{
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">operation</span>(): <span class="cm-variable">string</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-string">"</span><span class="cm-string">Leaf"</span>;
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Composite class represents the complex components that may have children.</span>
 <span class="cm-comment">* Usually, the Composite objects delegate the actual work to their children and</span>
 <span class="cm-comment">* then "sum-up" the result.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">Composite</span> <span class="cm-keyword">extends</span> <span class="cm-variable">Component</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* @var \SplObjectStorage</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">protected</span> <span class="cm-variable-2">$children</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>()
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">\SplObjectStorage</span>();
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* A composite object can add or remove other components (both simple or</span>
     <span class="cm-comment">* complex) to or from its child list.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">add</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span><span class="cm-operator">-&gt;</span><span class="cm-variable">attach</span>(<span class="cm-variable-2">$component</span>);
        <span class="cm-variable-2">$component</span><span class="cm-operator">-&gt;</span><span class="cm-variable">setParent</span>(<span class="cm-variable-2">$this</span>);
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">remove</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span><span class="cm-operator">-&gt;</span><span class="cm-variable">detach</span>(<span class="cm-variable-2">$component</span>);
        <span class="cm-variable-2">$component</span><span class="cm-operator">-&gt;</span><span class="cm-variable">setParent</span>(<span class="cm-atom">null</span>);
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">isComposite</span>(): <span class="cm-variable">bool</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-atom">true</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The Composite executes its primary logic in a particular way. It</span>
     <span class="cm-comment">* traverses recursively through all its children, collecting and summing</span>
     <span class="cm-comment">* their results. Since the composite's children pass these calls to their</span>
     <span class="cm-comment">* children and so forth, the whole object tree is traversed as a result.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">operation</span>(): <span class="cm-variable">string</span>
    {
        <span class="cm-variable-2">$results</span> <span class="cm-operator">=</span> [];
        <span class="cm-keyword">foreach</span> (<span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span> <span class="cm-keyword">as</span> <span class="cm-variable-2">$child</span>) {
            <span class="cm-variable-2">$results</span>[] <span class="cm-operator">=</span> <span class="cm-variable-2">$child</span><span class="cm-operator">-&gt;</span><span class="cm-variable">operation</span>();
        }

        <span class="cm-keyword">return</span> <span class="cm-string">"</span><span class="cm-string">Branch("</span> . <span class="cm-builtin">implode</span>(<span class="cm-string">"</span><span class="cm-string">+"</span>, <span class="cm-variable-2">$results</span>) . <span class="cm-string">"</span><span class="cm-string">)"</span>;
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The client code works with all of the components via the base interface.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">function</span> <span class="cm-def">clientCode</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>)
{
    <span class="cm-comment">// ...</span>

    <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">RESULT: "</span> . <span class="cm-variable-2">$component</span><span class="cm-operator">-&gt;</span><span class="cm-variable">operation</span>();

    <span class="cm-comment">// ...</span>
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* This way the client code can support the simple leaf components...</span>
 <span class="cm-comment">*/</span>
<span class="cm-variable-2">$simple</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>();
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: I've got a simple component:\n"</span>;
<span class="cm-variable">clientCode</span>(<span class="cm-variable-2">$simple</span>);
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">\n\n"</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* ...as well as the complex composites.</span>
 <span class="cm-comment">*/</span>
<span class="cm-variable-2">$tree</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Composite</span>();
<span class="cm-variable-2">$branch1</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Composite</span>();
<span class="cm-variable-2">$branch1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>());
<span class="cm-variable-2">$branch1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>());
<span class="cm-variable-2">$branch2</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Composite</span>();
<span class="cm-variable-2">$branch2</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>());
<span class="cm-variable-2">$tree</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-variable-2">$branch1</span>);
<span class="cm-variable-2">$tree</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-variable-2">$branch2</span>);
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: Now I've got a composite tree:\n"</span>;
<span class="cm-variable">clientCode</span>(<span class="cm-variable-2">$tree</span>);
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">\n\n"</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* Thanks to the fact that the child-management operations are declared in the</span>
 <span class="cm-comment">* base Component class, the client code can work with any component, simple or</span>
 <span class="cm-comment">* complex, without depending on their concrete classes.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">function</span> <span class="cm-def">clientCode2</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component1</span>, <span class="cm-variable">Component</span> <span class="cm-variable-2">$component2</span>)
{
    <span class="cm-comment">// ...</span>

    <span class="cm-keyword">if</span> (<span class="cm-variable-2">$component1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">isComposite</span>()) {
        <span class="cm-variable-2">$component1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-variable-2">$component2</span>);
    }
    <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">RESULT: "</span> . <span class="cm-variable-2">$component1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">operation</span>();

    <span class="cm-comment">// ...</span>
}

<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: I don't need to check the components classes even when managing the tree:\n"</span>;
<span class="cm-variable">clientCode2</span>(<span class="cm-variable-2">$tree</span>, <span class="cm-variable-2">$simple</span>);
</pre><pre class="code cm-s-default CodeMirror" lang="php"><span class="cm-operator">&lt;?</span><span class="cm-variable">php</span>

<span class="cm-keyword">namespace</span> <span class="cm-def">RefactoringGuru</span><span class="cm-def">\Composite</span><span class="cm-def">\Conceptual</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The base Component class declares common operations for both simple and</span>
 <span class="cm-comment">* complex objects of a composition.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">abstract</span> <span class="cm-keyword">class</span> <span class="cm-def">Component</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* @var Component|null</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">protected</span> <span class="cm-variable-2">$parent</span>;

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Optionally, the base Component can declare an interface for setting and</span>
     <span class="cm-comment">* accessing a parent of the component in a tree structure. It can also</span>
     <span class="cm-comment">* provide some default implementation for these methods.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">setParent</span>(<span class="cm-operator">?</span><span class="cm-variable">Component</span> <span class="cm-variable-2">$parent</span>)
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-keyword">parent</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$parent</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">getParent</span>(): <span class="cm-variable">Component</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-keyword">parent</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* In some cases, it would be beneficial to define the child-management</span>
     <span class="cm-comment">* operations right in the base Component class. This way, you won't need to</span>
     <span class="cm-comment">* expose any concrete component classes to the client code, even during the</span>
     <span class="cm-comment">* object tree assembly. The downside is that these methods will be empty</span>
     <span class="cm-comment">* for the leaf-level components.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">add</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span> { }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">remove</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span> { }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* You can provide a method that lets the client code figure out whether a</span>
     <span class="cm-comment">* component can bear children.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">isComposite</span>(): <span class="cm-variable">bool</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-atom">false</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The base Component may implement some default behavior or leave it to</span>
     <span class="cm-comment">* concrete classes (by declaring the method containing the behavior as</span>
     <span class="cm-comment">* "abstract").</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">abstract</span> <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">operation</span>(): <span class="cm-variable">string</span>;
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Leaf class represents the end objects of a composition. A leaf can't have</span>
 <span class="cm-comment">* any children.</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* Usually, it's the Leaf objects that do the actual work, whereas Composite</span>
 <span class="cm-comment">* objects only delegate to their sub-components.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">Leaf</span> <span class="cm-keyword">extends</span> <span class="cm-variable">Component</span>
{
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">operation</span>(): <span class="cm-variable">string</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-string">"</span><span class="cm-string">Leaf"</span>;
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Composite class represents the complex components that may have children.</span>
 <span class="cm-comment">* Usually, the Composite objects delegate the actual work to their children and</span>
 <span class="cm-comment">* then "sum-up" the result.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">Composite</span> <span class="cm-keyword">extends</span> <span class="cm-variable">Component</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* @var \SplObjectStorage</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">protected</span> <span class="cm-variable-2">$children</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>()
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">\SplObjectStorage</span>();
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* A composite object can add or remove other components (both simple or</span>
     <span class="cm-comment">* complex) to or from its child list.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">add</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span><span class="cm-operator">-&gt;</span><span class="cm-variable">attach</span>(<span class="cm-variable-2">$component</span>);
        <span class="cm-variable-2">$component</span><span class="cm-operator">-&gt;</span><span class="cm-variable">setParent</span>(<span class="cm-variable-2">$this</span>);
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">remove</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span><span class="cm-operator">-&gt;</span><span class="cm-variable">detach</span>(<span class="cm-variable-2">$component</span>);
        <span class="cm-variable-2">$component</span><span class="cm-operator">-&gt;</span><span class="cm-variable">setParent</span>(<span class="cm-atom">null</span>);
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">isComposite</span>(): <span class="cm-variable">bool</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-atom">true</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The Composite executes its primary logic in a particular way. It</span>
     <span class="cm-comment">* traverses recursively through all its children, collecting and summing</span>
     <span class="cm-comment">* their results. Since the composite's children pass these calls to their</span>
     <span class="cm-comment">* children and so forth, the whole object tree is traversed as a result.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">operation</span>(): <span class="cm-variable">string</span>
    {
        <span class="cm-variable-2">$results</span> <span class="cm-operator">=</span> [];
        <span class="cm-keyword">foreach</span> (<span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">children</span> <span class="cm-keyword">as</span> <span class="cm-variable-2">$child</span>) {
            <span class="cm-variable-2">$results</span>[] <span class="cm-operator">=</span> <span class="cm-variable-2">$child</span><span class="cm-operator">-&gt;</span><span class="cm-variable">operation</span>();
        }

        <span class="cm-keyword">return</span> <span class="cm-string">"</span><span class="cm-string">Branch("</span> . <span class="cm-builtin">implode</span>(<span class="cm-string">"</span><span class="cm-string">+"</span>, <span class="cm-variable-2">$results</span>) . <span class="cm-string">"</span><span class="cm-string">)"</span>;
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The client code works with all of the components via the base interface.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">function</span> <span class="cm-def">clientCode</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component</span>)
{
    <span class="cm-comment">// ...</span>

    <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">RESULT: "</span> . <span class="cm-variable-2">$component</span><span class="cm-operator">-&gt;</span><span class="cm-variable">operation</span>();

    <span class="cm-comment">// ...</span>
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* This way the client code can support the simple leaf components...</span>
 <span class="cm-comment">*/</span>
<span class="cm-variable-2">$simple</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>();
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: I've got a simple component:\n"</span>;
<span class="cm-variable">clientCode</span>(<span class="cm-variable-2">$simple</span>);
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">\n\n"</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* ...as well as the complex composites.</span>
 <span class="cm-comment">*/</span>
<span class="cm-variable-2">$tree</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Composite</span>();
<span class="cm-variable-2">$branch1</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Composite</span>();
<span class="cm-variable-2">$branch1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>());
<span class="cm-variable-2">$branch1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>());
<span class="cm-variable-2">$branch2</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Composite</span>();
<span class="cm-variable-2">$branch2</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-keyword">new</span> <span class="cm-variable">Leaf</span>());
<span class="cm-variable-2">$tree</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-variable-2">$branch1</span>);
<span class="cm-variable-2">$tree</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-variable-2">$branch2</span>);
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: Now I've got a composite tree:\n"</span>;
<span class="cm-variable">clientCode</span>(<span class="cm-variable-2">$tree</span>);
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">\n\n"</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* Thanks to the fact that the child-management operations are declared in the</span>
 <span class="cm-comment">* base Component class, the client code can work with any component, simple or</span>
 <span class="cm-comment">* complex, without depending on their concrete classes.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">function</span> <span class="cm-def">clientCode2</span>(<span class="cm-variable">Component</span> <span class="cm-variable-2">$component1</span>, <span class="cm-variable">Component</span> <span class="cm-variable-2">$component2</span>)
{
    <span class="cm-comment">// ...</span>

    <span class="cm-keyword">if</span> (<span class="cm-variable-2">$component1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">isComposite</span>()) {
        <span class="cm-variable-2">$component1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">add</span>(<span class="cm-variable-2">$component2</span>);
    }
    <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">RESULT: "</span> . <span class="cm-variable-2">$component1</span><span class="cm-operator">-&gt;</span><span class="cm-variable">operation</span>();

    <span class="cm-comment">// ...</span>
}

<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: I don't need to check the components classes even when managing the tree:\n"</span>;
<span class="cm-variable">clientCode2</span>(<span class="cm-variable-2">$tree</span>, <span class="cm-variable-2">$simple</span>);
</pre>
           
        </div>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>