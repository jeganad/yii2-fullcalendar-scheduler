<?php

namespace edofre\fullcalenderscheduler;

/**
 * Class CoreAsset
 * @package edofre\fullcalenderscheduler
 */
class CoreAsset extends \yii\web\AssetBundle
{
	/**
	 * @var  boolean
	 * Whether to automatically generate the needed language js files.
	 * If this is true, the language js files will be determined based on the actual usage of [[DatePicker]]
	 * and its language settings. If this is false, you should explicitly specify the language js files via [[js]].
	 */
	public $autoGenerate = true;
	/** @var  array Required CSS files for the fullcalendar */
	public $css = [
		'scheduler.css',
	];
	/** @var  array List of the dependencies this assets bundle requires */
	public $depends = [
		'yii\web\YiiAsset',
		'edofre\fullcalenderscheduler\MomentAsset',
		'edofre\fullcalenderscheduler\PrintAsset',
	];
	/**
	 * @var  boolean
	 * FullCalendar can display events from a public Google Calendar. Google Calendar can serve as a backend that manages and persistently stores event data (a feature that FullCalendar currently lacks).
	 * Please read http://fullcalendar.io/docs/google_calendar/ for more information
	 */
	public $googleCalendar = false;
	/** @var  array Required JS files for the fullcalendar */
	public $js = [
		'scheduler.js',
	];
	/** @var  string Language for the fullcalendar */
	public $language = null;
	/** @var  string Location of the fullcalendar scheduler distribution */
	public $sourcePath = '@bower/fullcalendar-scheduler/dist';

	/**
	 * @inheritdoc
	 */
	public function registerAssetFiles($view)
	{
		$language = empty($this->language) ? \Yii::$app->language : $this->language;
		if (file_exists($this->sourcePath . "/lang/$language.js")) {
			$this->js[] = "lang/$language.js";
		}

		if ($this->googleCalendar) {
			$this->js[] = 'gcal.js';
		}

		parent::registerAssetFiles($view);
	}
}
