<form action="index.php" method="POST">
    <-----<label for="asignatura">Asignatura</label>
    <select name="asignatura[]" id="asignatura" multiple>
        <option value="Ingles">Ingles</option>
        <option value="Matematica">Matematica</option>
        <option value="Lengua">Lengua</option>
        <option value="Ciencia">Ciencia</option>
    </select>
    ---!->
    <br><br>

    <label for="opcion-1">
        <input type="checkbox" id="opcion-1" name="frutas[]" value="Manzana">
        Manzana
    </label>
    <label for="opcion-2">
        <input type="checkbox" id="opcion-2" name="frutas[]" value="Platano">Platano
    </label>
    <label for="opcion-3">
        <input type="checkbox" id="opcion-3" name="frutas[]" value="Naranja">Naranja
    </label>
    <label for="opcion-4">
        <input type="checkbox" id="opcion-4" name="frutas[]" value="Sandia">Sandia
    </label>





    <button type="submit">Enviar</button>
</form>