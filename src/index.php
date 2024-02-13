<!DOCTYPE html>
<html>
<head>
    <title>Lista</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/static/favicon.png">
    <link rel="stylesheet" type="text/css" href="/static/pure-min.css">
    <style>
        html, body {
            background-color: #fff;
        }
    </style>
</head>
<body>
<div class="pure-g">
    <div class="pure-u-1-5"></div>
    <div class="pure-u-3-5">
        <h1>Welcome, <?= $name ?>!</h1>
        <table class="pure-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr class="<?php echo $u['id'] % 2 == 0 ? 'pure-table-odd' : ''; ?>">
                    <td><?php echo $u['id']; ?></td>
                    <td><?php echo $u['nome']; ?></td>
                    <td><?php echo $u['email']; ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($usuarios)): ?>
                <tr>
                    <td colspan="3">Recarregue a página para cadastrar o primeiro usuário</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="pure-u-1-5"></div>
</div>
</body>
</html>
