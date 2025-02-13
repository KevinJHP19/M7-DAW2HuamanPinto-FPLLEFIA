<?php
 include '../header.php';
?>
<link rel="stylesheet" href="../estilos.css">
<style>
    .cm-mensaje{
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
        <h1>Strategy</h1>
        <div class="container text-start ps-5" mb-3>
            <p>Es un patrón de diseño de comportamiento que te permite definir una familia de algoritmos, colocar cada uno de ellos en una clase separada y hacer sus objetos intercambiables.</p>
            <p>Strategy es un patrón de diseño de comportamiento que convierte un grupo de comportamientos en objetos y los hace intercambiables dentro del objeto de contexto original.</p>
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
                                <li>Puedes intercambiar algoritmos usados dentro de un objeto durante el tiempo de ejecución.</li>
                                <li>Puedes aislar los detalles de implementación de un algoritmo del código que lo utiliza.</li>
                                <li>Puedes sustituir la herencia por composición.</li>
                                
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="text-start">
                                <li>Los clientes deben conocer las diferencias entre estrategias para poder seleccionar la adecuada.</li>
                                <li>Si sólo tienes un par de algoritmos que raramente cambian, no hay una razón real para complicar el programa en exceso con nuevas clases e interfaces que vengan con el patrón.
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                    
                </div>
            
            <div class="text-center">
                <img src="../images/strategy.png" alt="" class="img-fluid">
            </div>

            
        </div>
        <div  class="ejemplo text-start bg-secondary-subtle p-5">
            <h4>Ejemplo:</h4>
            <pre class="code cm-s-default CodeMirror" lang="php"><span class="cm-operator">&lt;?</span><span class="cm-variable">php</span>

<span class="cm-keyword">namespace</span> <span class="cm-def">RefactoringGuru</span><span class="cm-def">\Strategy</span><span class="cm-def">\Conceptual</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Context defines the interface of interest to clients.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">Context</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* @var Strategy The Context maintains a reference to one of the Strategy</span>
     <span class="cm-comment">* objects. The Context does not know the concrete class of a strategy. It</span>
     <span class="cm-comment">* should work with all strategies via the Strategy interface.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">private</span> <span class="cm-variable-2">$strategy</span>;

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Usually, the Context accepts a strategy through the constructor, but also</span>
     <span class="cm-comment">* provides a setter to change it at runtime.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>(<span class="cm-variable">Strategy</span> <span class="cm-variable-2">$strategy</span>)
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">strategy</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$strategy</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Usually, the Context allows replacing a Strategy object at runtime.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">setStrategy</span>(<span class="cm-variable">Strategy</span> <span class="cm-variable-2">$strategy</span>)
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">strategy</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$strategy</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The Context delegates some work to the Strategy object instead of</span>
     <span class="cm-comment">* implementing multiple versions of the algorithm on its own.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">doSomeBusinessLogic</span>(): <span class="cm-variable">void</span>
    {
        <span class="cm-comment">// ...</span>

        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Context: Sorting data using the strategy (not sure how it'll do it)\n"</span>;
        <span class="cm-variable-2">$result</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">strategy</span><span class="cm-operator">-&gt;</span><span class="cm-variable">doAlgorithm</span>([<span class="cm-string">"</span><span class="cm-string">a"</span>, <span class="cm-string">"</span><span class="cm-string">b"</span>, <span class="cm-string">"</span><span class="cm-string">c"</span>, <span class="cm-string">"</span><span class="cm-string">d"</span>, <span class="cm-string">"</span><span class="cm-string">e"</span>]);
        <span class="cm-keyword">echo</span> <span class="cm-builtin">implode</span>(<span class="cm-string">"</span><span class="cm-string">,"</span>, <span class="cm-variable-2">$result</span>) . <span class="cm-string">"</span><span class="cm-string">\n"</span>;

        <span class="cm-comment">// ...</span>
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Strategy interface declares operations common to all supported versions</span>
 <span class="cm-comment">* of some algorithm.</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* The Context uses this interface to call the algorithm defined by Concrete</span>
 <span class="cm-comment">* Strategies.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">interface</span> <span class="cm-def">Strategy</span>
{
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">doAlgorithm</span>(<span class="cm-keyword">array</span> <span class="cm-variable-2">$data</span>): <span class="cm-keyword">array</span>;
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* Concrete Strategies implement the algorithm while following the base Strategy</span>
 <span class="cm-comment">* interface. The interface makes them interchangeable in the Context.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">ConcreteStrategyA</span> <span class="cm-keyword">implements</span> <span class="cm-variable">Strategy</span>
{
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">doAlgorithm</span>(<span class="cm-keyword">array</span> <span class="cm-variable-2">$data</span>): <span class="cm-keyword">array</span>
    {
        <span class="cm-builtin">sort</span>(<span class="cm-variable-2">$data</span>);

        <span class="cm-keyword">return</span> <span class="cm-variable-2">$data</span>;
    }
}

<span class="cm-keyword">class</span> <span class="cm-def">ConcreteStrategyB</span> <span class="cm-keyword">implements</span> <span class="cm-variable">Strategy</span>
{
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">doAlgorithm</span>(<span class="cm-keyword">array</span> <span class="cm-variable-2">$data</span>): <span class="cm-keyword">array</span>
    {
        <span class="cm-builtin">rsort</span>(<span class="cm-variable-2">$data</span>);

        <span class="cm-keyword">return</span> <span class="cm-variable-2">$data</span>;
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The client code picks a concrete strategy and passes it to the context. The</span>
 <span class="cm-comment">* client should be aware of the differences between strategies in order to make</span>
 <span class="cm-comment">* the right choice.</span>
 <span class="cm-comment">*/</span>
<span class="cm-variable-2">$context</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Context</span>(<span class="cm-keyword">new</span> <span class="cm-variable">ConcreteStrategyA</span>());
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: Strategy is set to normal sorting.\n"</span>;
<span class="cm-variable-2">$context</span><span class="cm-operator">-&gt;</span><span class="cm-variable">doSomeBusinessLogic</span>();

<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">\n"</span>;

<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Client: Strategy is set to reverse sorting.\n"</span>;
<span class="cm-variable-2">$context</span><span class="cm-operator">-&gt;</span><span class="cm-variable">setStrategy</span>(<span class="cm-keyword">new</span> <span class="cm-variable">ConcreteStrategyB</span>());
<span class="cm-variable-2">$context</span><span class="cm-operator">-&gt;</span><span class="cm-variable">doSomeBusinessLogic</span>();
</pre>
        </div>
    </div>
</div></main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>