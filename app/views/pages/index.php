<h1>Welcome to Blank Slate</h1>
<ul>
    <?php
    foreach ($data['examples'] as $example) {
        echo '<li>' . $example->title . '</li>';
    }
    ?>
</ul>