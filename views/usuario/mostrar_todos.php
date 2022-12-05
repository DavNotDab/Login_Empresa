
<h2>Usuarios registrados:</h2>

<?php
session_start();
if (isset($todos_mis_usuarios)) : ?>
<table class="listado">
    <tr>
        <th>C&oacute;digo</th>
        <th>Nombre de usuario</th>
        <th>Clave encriptada</th>
        <th>Rol</th>
        <th colspan="3">Acciones</th>
    </tr>
    <?php foreach ($todos_mis_usuarios as $usuario) : ?>
        <tr>
        <?php foreach ($usuario->toArray() as $value) : ?>
            <td><?= $value ?></td>
        <?php endforeach; ?>
            <td>
                <form action="<?= base_url.'Usuario/update&usuario='.$usuario->getNombre()?>" method="GET">
                    <input type="submit" name="usuario" value="Modificar" class="boton">
                </form>
            </td>
            <?php if ($_SERVER["REQUEST_METHOD"] == "GET") : ?>
                <?php if (!isset($_GET["usuario"])) $_GET["usuario"] = ""; ?>
                <?php if ($usuario->getNombre() == $_GET["usuario"]) : ?>
                    <td>
                        <form action="<?=base_url.'Usuario/delete'?>" method="POST">
                            <input type="submit" name="usuario" value="X" class="boton_cancel">
                        </form>
                    </td>
                    <td>
                        <form action="<?=base_url.'Usuario/delete'?>" method="POST">
                            <button class="boton_confirm" type="submit" name="usuario" value="<?=$usuario->getNombre()?>">&#10003;</button>
                        </form>
                    </td>
                <?php else: ?>
                    <td colspan="2">
                        <form action="<?=base_url.'Usuario/delete&usuario='.$usuario->getNombre()?>" method="GET">
                            <input type="submit" name="usuario" value="Eliminar" class="boton">
                        </form>
                    </td>
                <?php endif; ?>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
