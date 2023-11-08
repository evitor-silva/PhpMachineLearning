<?php
require "vendor\autoload.php";

use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\Classifiers\ExtraTreeClassifier;
use Rubix\ML\Classifiers\RandomForest;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Transformers\LambdaFunction;
use Rubix\ML\Transformers\NumericStringConverter;


$consulta = 'Strada LX 1.6';


$dataset
    ->apply(new NumericStringConverter());

[$training, $testing] = $dataset->stratifiedSplit(0.7);

$tree = new ExtraTreeClassifier();
$tree->train($training);
$tree->predict($testing);


$a = $tree->predict(new Unlabeled([
    ['','Fiat', $consulta, '2012']
]));

var_dump($a);