<?php

return [

	'options' => [
		'available_types' => [
			'title' => ['text','align','style'],
			'legend' => ['itemStyle'],
			'plotOption' => ['plotOption','shared','valueSuffix'],
			'subtitle' => ['text','style'],
			'xAxis' => ['categories','tickWidth','gridLineWidth','labels'],
			'yAxis' => ['text','label','showFirstLabel'],
			'chart' => ['style','backgroundColor','borderColor','borderRadius','borderWidth','marginTop','className'],
		],
	],

	'series' => [
		'available_types' => ['name','data','zIndex','color','type','fillOpacity','lineWidth'],
	]
];
