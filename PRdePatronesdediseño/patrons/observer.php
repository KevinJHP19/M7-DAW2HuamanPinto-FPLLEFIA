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
        <h1>Observer</h1>
        <div class="container text-start ps-5" mb-3>
            <p>Es un patrón de diseño de comportamiento que te permite definir un mecanismo de suscripción para notificar a varios objetos sobre cualquier evento que le suceda al objeto que están observando.</p>
            <p>Se utiliza muy amenudo en sistemas basados en algun codigo heredado, es muy reconocido por un constructor que toma una instancias de un distinto tipo de clase abstracta, cuando el adaptador recibe una llamada de un mentodo, convierte los parametros al formato adecuado que despues dirige la llamada a uno o varios metodos del objeto envuelto</p>
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
                                <li>Puedes introducir nuevas clases suscriptoras sin tener que cambiar el código de la notificadora.</li>
                                <li>Puedes establecer relaciones entre objetos durante el tiempo de ejecución.</li>
                                
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="text-start">
                                <li>Los suscriptores son notificados en un orden aleatorio.</li>
                                <li>Si hay demasiados observadores, la estructura del código puede volverse difícil de gestionar y depurar.</li>
                                <li>Los observadores pueden ejecutarse en cualquier orden, lo que puede ser problemático si hay dependencias entre ellos.</li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                    
                </div>
            
            <div class="text-center">
                <img src="../images/observer.png" class="img-fluid">
            </div>

            
        </div>
        <div  class="ejemplo text-start bg-secondary-subtle p-5">
            <h4>Ejemplo:</h4>
            <pre class="code cm-s-default CodeMirror" lang="php"><span class="cm-operator">&lt;?</span><span class="cm-variable">php</span>

<span class="cm-keyword">namespace</span> <span class="cm-def">RefactoringGuru</span><span class="cm-def">\Observer</span><span class="cm-def">\Conceptual</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* PHP has a couple of built-in interfaces related to the Observer pattern.</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* Here's what the Subject interface looks like:</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* @link http://php.net/manual/en/class.splsubject.php</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">*     interface SplSubject</span>
 <span class="cm-comment">*     {</span>
 <span class="cm-comment">*         // Attach an observer to the subject.</span>
 <span class="cm-comment">*         public function attach(SplObserver $observer);</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">*         // Detach an observer from the subject.</span>
 <span class="cm-comment">*         public function detach(SplObserver $observer);</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">*         // Notify all observers about an event.</span>
 <span class="cm-comment">*         public function notify();</span>
 <span class="cm-comment">*     }</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* There's also a built-in interface for Observers:</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* @link http://php.net/manual/en/class.splobserver.php</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">*     interface SplObserver</span>
 <span class="cm-comment">*     {</span>
 <span class="cm-comment">*         public function update(SplSubject $subject);</span>
 <span class="cm-comment">*     }</span>
 <span class="cm-comment">*/</span>

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Subject owns some important state and notifies observers when the state</span>
 <span class="cm-comment">* changes.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">Subject</span> <span class="cm-keyword">implements</span> <span class="cm-variable">\SplSubject</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* @var int For the sake of simplicity, the Subject's state, essential to</span>
     <span class="cm-comment">* all subscribers, is stored in this variable.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-variable-2">$state</span>;

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* @var \SplObjectStorage List of subscribers. In real life, the list of</span>
     <span class="cm-comment">* subscribers can be stored more comprehensively (categorized by event</span>
     <span class="cm-comment">* type, etc.).</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">private</span> <span class="cm-variable-2">$observers</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>()
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">observers</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">\SplObjectStorage</span>();
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The subscription management methods.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">attach</span>(<span class="cm-variable">\SplObserver</span> <span class="cm-variable-2">$observer</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Subject: Attached an observer.\n"</span>;
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">observers</span><span class="cm-operator">-&gt;</span><span class="cm-variable">attach</span>(<span class="cm-variable-2">$observer</span>);
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">detach</span>(<span class="cm-variable">\SplObserver</span> <span class="cm-variable-2">$observer</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">observers</span><span class="cm-operator">-&gt;</span><span class="cm-variable">detach</span>(<span class="cm-variable-2">$observer</span>);
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Subject: Detached an observer.\n"</span>;
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Trigger an update in each subscriber.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">notify</span>(): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Subject: Notifying observers...\n"</span>;
        <span class="cm-keyword">foreach</span> (<span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">observers</span> <span class="cm-keyword">as</span> <span class="cm-variable-2">$observer</span>) {
            <span class="cm-variable-2">$observer</span><span class="cm-operator">-&gt;</span><span class="cm-variable">update</span>(<span class="cm-variable-2">$this</span>);
        }
    }

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* Usually, the subscription logic is only a fraction of what a Subject can</span>
     <span class="cm-comment">* really do. Subjects commonly hold some important business logic, that</span>
     <span class="cm-comment">* triggers a notification method whenever something important is about to</span>
     <span class="cm-comment">* happen (or after it).</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">someBusinessLogic</span>(): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">\nSubject: I'm doing something important.\n"</span>;
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">state</span> <span class="cm-operator">=</span> <span class="cm-builtin">rand</span>(<span class="cm-number">0</span>, <span class="cm-number">10</span>);

        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Subject: My state has just changed to: </span><span class="cm-string"></span>{<span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">state</span>}<span class="cm-string">\n"</span>;
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">notify</span>();
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* Concrete Observers react to the updates issued by the Subject they had been</span>
 <span class="cm-comment">* attached to.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">ConcreteObserverA</span> <span class="cm-keyword">implements</span> <span class="cm-variable">\SplObserver</span>
{
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">update</span>(<span class="cm-variable">\SplSubject</span> <span class="cm-variable-2">$subject</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">if</span> (<span class="cm-variable-2">$subject</span><span class="cm-operator">-&gt;</span><span class="cm-variable">state</span> <span class="cm-operator">&lt;</span> <span class="cm-number">3</span>) {
            <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">ConcreteObserverA: Reacted to the event.\n"</span>;
        }
    }
}

<span class="cm-keyword">class</span> <span class="cm-def">ConcreteObserverB</span> <span class="cm-keyword">implements</span> <span class="cm-variable">\SplObserver</span>
{
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">update</span>(<span class="cm-variable">\SplSubject</span> <span class="cm-variable-2">$subject</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">if</span> (<span class="cm-variable-2">$subject</span><span class="cm-operator">-&gt;</span><span class="cm-variable">state</span> <span class="cm-operator">==</span> <span class="cm-number">0</span> <span class="cm-operator">||</span> <span class="cm-variable-2">$subject</span><span class="cm-operator">-&gt;</span><span class="cm-variable">state</span> <span class="cm-operator">&gt;=</span> <span class="cm-number">2</span>) {
            <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">ConcreteObserverB: Reacted to the event.\n"</span>;
        }
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The client code.</span>
 <span class="cm-comment">*/</span>

<span class="cm-variable-2">$subject</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Subject</span>();

<span class="cm-variable-2">$o1</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">ConcreteObserverA</span>();
<span class="cm-variable-2">$subject</span><span class="cm-operator">-&gt;</span><span class="cm-variable">attach</span>(<span class="cm-variable-2">$o1</span>);

<span class="cm-variable-2">$o2</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">ConcreteObserverB</span>();
<span class="cm-variable-2">$subject</span><span class="cm-operator">-&gt;</span><span class="cm-variable">attach</span>(<span class="cm-variable-2">$o2</span>);

<span class="cm-variable-2">$subject</span><span class="cm-operator">-&gt;</span><span class="cm-variable">someBusinessLogic</span>();
<span class="cm-variable-2">$subject</span><span class="cm-operator">-&gt;</span><span class="cm-variable">someBusinessLogic</span>();

<span class="cm-variable-2">$subject</span><span class="cm-operator">-&gt;</span><span class="cm-variable">detach</span>(<span class="cm-variable-2">$o2</span>);

<span class="cm-variable-2">$subject</span><span class="cm-operator">-&gt;</span><span class="cm-variable">someBusinessLogic</span>();
</pre>
        </div>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>