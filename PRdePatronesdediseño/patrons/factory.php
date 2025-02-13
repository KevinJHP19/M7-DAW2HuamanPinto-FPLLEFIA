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
        <h1>Factory</h1>
        <div class="container text-start ps-5" mb-3>
            <p>Es un patrón de diseño creacional que proporciona una interfaz para crear objetos en una superclase, mientras permite a las subclases alterar el tipo de objetos que se crearán.</p>
            <p>Define un método que debe utilizarse para crear objetos, en lugar de una llamada directa al constructor (operador new). Las subclases pueden sobrescribir este método para cambiar las clases de los objetos que se crearán.</p>
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
                                <li>Evitas un acoplamiento fuerte entre el creador y los productos concretos.</li>
                                <li>Puedes mover el código de creación de producto a un lugar del programa, haciendo que el código sea más fácil de mantener.</li>
                                <li>Puedes incorporar nuevos tipos de productos en el programa sin descomponer el código cliente existente.</li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="text-start">
                                <li>Puede ser que el código se complique, ya que debes incorporar una multitud de nuevas subclases para implementar el patrón. La situación ideal sería introducir el patrón en una jerarquía existente de clases creadoras.</li>
                                <li>Como la creación de objetos está abstraída, puede ser más complicado rastrear errores cuando algo falla en la instancia de un objeto.
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                    
                </div>
            
            <div class="text-center">
                <img src="../images/factory-method-es.png" alt="" class="img-fluid">
            </div>

            
        </div>
        <div  class="ejemplo text-start bg-secondary-subtle p-5">
            <h4>Ejemplo:</h4>
            <pre class="code cm-s-default CodeMirror" lang="php"><span class="cm-operator">&lt;?</span><span class="cm-variable">php</span>

<span class="cm-keyword">namespace</span> <span class="cm-def">RefactoringGuru</span><span class="cm-def">\FactoryMethod</span><span class="cm-def">\RealWorld</span>;

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Creator declares a factory method that can be used as a substitution for</span>
 <span class="cm-comment">* the direct constructor calls of products, for instance:</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* - Before: $p = new FacebookConnector();</span>
 <span class="cm-comment">* - After: $p = $this-&gt;getSocialNetwork;</span>
 <span class="cm-comment">*</span>
 <span class="cm-comment">* This allows changing the type of the product being created by</span>
 <span class="cm-comment">* SocialNetworkPoster's subclasses.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">abstract</span> <span class="cm-keyword">class</span> <span class="cm-def">SocialNetworkPoster</span>
{
    <span class="cm-comment">/**</span>
     <span class="cm-comment">* The actual factory method. Note that it returns the abstract connector.</span>
     <span class="cm-comment">* This lets subclasses return any concrete connectors without breaking the</span>
     <span class="cm-comment">* superclass' contract.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">abstract</span> <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">getSocialNetwork</span>(): <span class="cm-variable">SocialNetworkConnector</span>;

    <span class="cm-comment">/**</span>
     <span class="cm-comment">* When the factory method is used inside the Creator's business logic, the</span>
     <span class="cm-comment">* subclasses may alter the logic indirectly by returning different types of</span>
     <span class="cm-comment">* the connector from the factory method.</span>
     <span class="cm-comment">*/</span>
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">post</span>(<span class="cm-variable-2">$content</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-comment">// Call the factory method to create a Product object...</span>
        <span class="cm-variable-2">$network</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">getSocialNetwork</span>();
        <span class="cm-comment">// ...then use it as you will.</span>
        <span class="cm-variable-2">$network</span><span class="cm-operator">-&gt;</span><span class="cm-variable">logIn</span>();
        <span class="cm-variable-2">$network</span><span class="cm-operator">-&gt;</span><span class="cm-variable">createPost</span>(<span class="cm-variable-2">$content</span>);
        <span class="cm-variable-2">$network</span><span class="cm-operator">-&gt;</span><span class="cm-variable">logout</span>();
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* This Concrete Creator supports Facebook. Remember that this class also</span>
 <span class="cm-comment">* inherits the 'post' method from the parent class. Concrete Creators are the</span>
 <span class="cm-comment">* classes that the Client actually uses.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">FacebookPoster</span> <span class="cm-keyword">extends</span> <span class="cm-variable">SocialNetworkPoster</span>
{
    <span class="cm-keyword">private</span> <span class="cm-variable-2">$login</span>, <span class="cm-variable-2">$password</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>(<span class="cm-variable">string</span> <span class="cm-variable-2">$login</span>, <span class="cm-variable">string</span> <span class="cm-variable-2">$password</span>)
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">login</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$login</span>;
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">password</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$password</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">getSocialNetwork</span>(): <span class="cm-variable">SocialNetworkConnector</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-keyword">new</span> <span class="cm-variable">FacebookConnector</span>(<span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">login</span>, <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">password</span>);
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* This Concrete Creator supports LinkedIn.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">LinkedInPoster</span> <span class="cm-keyword">extends</span> <span class="cm-variable">SocialNetworkPoster</span>
{
    <span class="cm-keyword">private</span> <span class="cm-variable-2">$email</span>, <span class="cm-variable-2">$password</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>(<span class="cm-variable">string</span> <span class="cm-variable-2">$email</span>, <span class="cm-variable">string</span> <span class="cm-variable-2">$password</span>)
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">email</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$email</span>;
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">password</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$password</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">getSocialNetwork</span>(): <span class="cm-variable">SocialNetworkConnector</span>
    {
        <span class="cm-keyword">return</span> <span class="cm-keyword">new</span> <span class="cm-variable">LinkedInConnector</span>(<span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">email</span>, <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">password</span>);
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The Product interface declares behaviors of various types of products.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">interface</span> <span class="cm-def">SocialNetworkConnector</span>
{
    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">logIn</span>(): <span class="cm-variable">void</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">logOut</span>(): <span class="cm-variable">void</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">createPost</span>(<span class="cm-variable-2">$content</span>): <span class="cm-variable">void</span>;
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* This Concrete Product implements the Facebook API.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">FacebookConnector</span> <span class="cm-keyword">implements</span> <span class="cm-variable">SocialNetworkConnector</span>
{
    <span class="cm-keyword">private</span> <span class="cm-variable-2">$login</span>, <span class="cm-variable-2">$password</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>(<span class="cm-variable">string</span> <span class="cm-variable-2">$login</span>, <span class="cm-variable">string</span> <span class="cm-variable-2">$password</span>)
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">login</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$login</span>;
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">password</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$password</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">logIn</span>(): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Send HTTP API request to log in user </span><span class="cm-variable-2">$this</span>-&gt;<span class="cm-variable">login</span> <span class="cm-string">with "</span> .
            <span class="cm-string">"</span><span class="cm-string">password </span><span class="cm-variable-2">$this</span>-&gt;<span class="cm-variable">password</span><span class="cm-string">\n"</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">logOut</span>(): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Send HTTP API request to log out user </span><span class="cm-variable-2">$this</span>-&gt;<span class="cm-variable">login</span><span class="cm-string">\n"</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">createPost</span>(<span class="cm-variable-2">$content</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Send HTTP API requests to create a post in Facebook timeline.\n"</span>;
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* This Concrete Product implements the LinkedIn API.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">class</span> <span class="cm-def">LinkedInConnector</span> <span class="cm-keyword">implements</span> <span class="cm-variable">SocialNetworkConnector</span>
{
    <span class="cm-keyword">private</span> <span class="cm-variable-2">$email</span>, <span class="cm-variable-2">$password</span>;

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">__construct</span>(<span class="cm-variable">string</span> <span class="cm-variable-2">$email</span>, <span class="cm-variable">string</span> <span class="cm-variable-2">$password</span>)
    {
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">email</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$email</span>;
        <span class="cm-variable-2">$this</span><span class="cm-operator">-&gt;</span><span class="cm-variable">password</span> <span class="cm-operator">=</span> <span class="cm-variable-2">$password</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">logIn</span>(): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Send HTTP API request to log in user </span><span class="cm-variable-2">$this</span>-&gt;<span class="cm-variable">email</span> <span class="cm-string">with "</span> .
            <span class="cm-string">"</span><span class="cm-string">password </span><span class="cm-variable-2">$this</span>-&gt;<span class="cm-variable">password</span><span class="cm-string">\n"</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">logOut</span>(): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Send HTTP API request to log out user </span><span class="cm-variable-2">$this</span>-&gt;<span class="cm-variable">email</span><span class="cm-string">\n"</span>;
    }

    <span class="cm-keyword">public</span> <span class="cm-keyword">function</span> <span class="cm-def">createPost</span>(<span class="cm-variable-2">$content</span>): <span class="cm-variable">void</span>
    {
        <span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Send HTTP API requests to create a post in LinkedIn timeline.\n"</span>;
    }
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* The client code can work with any subclass of SocialNetworkPoster since it</span>
 <span class="cm-comment">* doesn't depend on concrete classes.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">function</span> <span class="cm-def">clientCode</span>(<span class="cm-variable">SocialNetworkPoster</span> <span class="cm-variable-2">$creator</span>)
{
    <span class="cm-comment">// ...</span>
    <span class="cm-variable-2">$creator</span><span class="cm-operator">-&gt;</span><span class="cm-variable">post</span>(<span class="cm-string">"</span><span class="cm-string">Hello world!"</span>);
    <span class="cm-variable-2">$creator</span><span class="cm-operator">-&gt;</span><span class="cm-variable">post</span>(<span class="cm-string">"</span><span class="cm-string">I had a large hamburger this morning!"</span>);
    <span class="cm-comment">// ...</span>
}

<span class="cm-comment">/**</span>
 <span class="cm-comment">* During the initialization phase, the app can decide which social network it</span>
 <span class="cm-comment">* wants to work with, create an object of the proper subclass, and pass it to</span>
 <span class="cm-comment">* the client code.</span>
 <span class="cm-comment">*/</span>
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Testing ConcreteCreator1:\n"</span>;
<span class="cm-variable">clientCode</span>(<span class="cm-keyword">new</span> <span class="cm-variable">FacebookPoster</span>(<span class="cm-string">"</span><span class="cm-string">john_smith"</span>, <span class="cm-string">"</span><span class="cm-string">******"</span>));
<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">\n\n"</span>;

<span class="cm-keyword">echo</span> <span class="cm-string">"</span><span class="cm-string">Testing ConcreteCreator2:\n"</span>;
<span class="cm-variable">clientCode</span>(<span class="cm-keyword">new</span> <span class="cm-variable">LinkedInPoster</span>(<span class="cm-string">"</span><span class="cm-string">john_smith@example.com"</span>, <span class="cm-string">"</span><span class="cm-string">******"</span>));
</pre>
        </div>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>