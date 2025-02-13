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
        <h1>Singleton</h1>
        <div class="container text-start ps-5" mb-3>
            <p>Es un patrón de diseño creacional que nos permite asegurarnos de que una clase tenga una única instancia, a la vez que proporciona un punto de acceso global a dicha instancia.</p>
            <p>El patrón tiene prácticamente los mismos pros y contras que las variables globales. Aunque son muy útiles, rompen la modularidad de tu código.

No se puede utilizar una clase que dependa del Singleton en otro contexto. Tendrás que llevar también la clase Singleton. La mayoría de las veces, esta limitación aparece durante la creación de pruebas de unidad.</p>
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
                                <li>Puedes tener la certeza de que una clase tiene una única instancia.</li>
                                <li>Obtienes un punto de acceso global a dicha instancia.</li>
                                <li>El objeto Singleton solo se inicializa cuando se requiere por primera vez.</li>
                                
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="text-start">
                                <li>Puede enmascarar un mal diseño, por ejemplo, cuando los componentes del programa saben demasiado los unos sobre los otros.</li>
                                <li>Requiere de un tratamiento especial en un entorno con múltiples hilos de ejecución, para que varios hilos no creen un objeto Singleton varias veces.</li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                    
                </div>
            
            <div class="text-center">
                <img src="../images/singleton.png" alt="" class="img-fluid">
            </div>

            
        </div>
        <div  class="ejemplo text-start bg-secondary-subtle p-5">
            <h4>Ejemplo:</h4>
            <pre class="code cm-s-default CodeMirror" lang="php"><span class="cm-operator">&lt;?</span><span class="cm-variable">php</span>

<span class="cm-keyword">namespace</span> <span class="cm-def">RefactoringGuru</span><span class="cm-def">\Singleton</span><span class="cm-def">\Conceptual</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Singleton class defines the `GetInstance` method that serves as an</span>
 <span class="cm-comment">* alternative to constructor and lets clients access the same instance of this</span>
 <span class="cm-comment">* class over and over.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">Singleton</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The Singleton's instance is stored in a static field. This field is an</span>
     <span class="cm-comment">* array, because we'll allow our Singleton to have subclasses. Each item in</span>
     <span class="cm-comment">* this array will be an instance of a specific Singleton's subclass. You'll</span>
     <span class="cm-comment">* see how this works in a moment.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">private</span> <span class="cm-keyword">static</span> <span class="cm-variable-2">$instances</span> <span class="cm-operator">=</span> [];

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The Singleton's constructor should always be private to prevent direct</span>
     <span class="cm-comment">* construction calls with the `new` operator.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">protected</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>() { }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Singletons should not be cloneable.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">protected</span> <span class="cm-keyword">function</span> <span class="cm-def">__clone</span>() { }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Singletons should not be restorable from strings.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__wakeup</span>()
    {
        <span class="cm-keyword">throw</span> <span class="cm-keyword">new</span> <span class="cm-variable">\Exception</span>(<span class="cm-string">"</span><span class="cm-string">Cannot unserialize a singleton."</span>);
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* This is the static method that controls the access to the singleton</span>
     <span class="cm-comment">* instance. On the first run, it creates a singleton object and places it</span>
     <span class="cm-comment">* into the static field. On subsequent runs, it returns the client existing</span>
     <span class="cm-comment">* object stored in the static field.</span>
     <span class="cm-comment">*</span>
     <span class="cm-comment">* This implementation lets you subclass the Singleton class while keeping</span>
     <span class="cm-comment">* just one instance of each subclass around.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">static</span> <span class="cm-keyword">function</span> <span class="cm-def">getInstance</span>(): <span class="cm-variable">Singleton</span>
    {
        <span class="cm-variable-2">$cls</span> <span class="cm-operator">=</span> <span class="cm-keyword">static</span>::<span class="cm-keyword">class</span>;
        <span class="cm-keyword">if</span> (<span class="cm-operator">!</span><span class="cm-keyword">isset</span>(<span class="cm-keyword">self</span>::<span class="cm-variable-2">$instances</span>[<span class="cm-variable-2">$cls</span>])) {
            <span class="cm-keyword">self</span>::<span class="cm-variable-2">$instances</span>[<span class="cm-variable-2">$cls</span>] <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-keyword">static</span>();
        }

        <span class="cm-keyword">return</span> <span class="cm-keyword">self</span>::<span class="cm-variable-2">$instances</span>[<span class="cm-variable-2">$cls</span>];
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Finally, any singleton should define some business logic, which can be</span>
     <span class="cm-comment">* executed on its instance.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">someBusinessLogic</span>()
    {
        <span class="cm-comment">// ...</span>
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The client code.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">function</span> <span class="cm-def">clientCode</span>()
{
    <span class="cm-variable-2">$s1</span> <span class="cm-operator">=</span> <span class="cm-variable">Singleton</span>::<span class="cm-variable">getInstance</span>();
    <span class="cm-variable-2">$s2</span> <span class="cm-operator">=</span> <span class="cm-variable">Singleton</span>::<span class="cm-variable">getInstance</span>();
    <span class="cm-keyword">if</span> (<span class="cm-variable-2">$s1</span> <span class="cm-operator">===</span> <span class="cm-variable-2">$s2</span>) {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Singleton works, both variables contain the same instance."</span>;
    } <span class="cm-keyword">else</span> {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Singleton failed, variables contain different instances."</span>;
    }
}

<span class="cm-variable">clientCode</span>();
</pre>
        </div>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>