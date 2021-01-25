<?php

namespace app\components\feedback\form\assets;

use app\assets\AppAsset;
use yii\web\AssetBundle;

class FeedbackFormAsset extends AssetBundle {
    public $sourcePath = '@app/components/feedback/form';

    public $js = [
        'web/js/feedback-form.js'
    ];

    public $depends = [
        AppAsset::class
    ];
}