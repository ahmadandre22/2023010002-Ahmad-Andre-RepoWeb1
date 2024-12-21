<?php

    $x = 5; // global scope
    function myTest()
    {

    // penggunan x didalam function akan menghasilkan error
    echo "<p>Variable x didalam function is: $x</p>";
    }
    myTest();
    echo "<p>Variable x diluar function is: $x</p>";
?>