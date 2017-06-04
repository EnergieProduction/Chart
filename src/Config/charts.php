<?php

return [

	'options' => [
		'available_types' => [
			'title' => ['text','align','style'],
			'legend' => ['itemStyle'],
			'plotOptions' => ['plotOption','shared','valueSuffix','series'],
			'subtitle' => ['text','style'],
			'xAxis' => ['title','categories','tickWidth','gridLineWidth','labels'],
			'yAxis' => ['title','label','showFirstLabel'],
			'chart' => ['style','backgroundColor','borderColor','borderRadius','borderWidth','marginTop','className'],
			'credits' => ['enabled'],
		],
	],

	'series' => [
		'available_types' => [
			'line' => ['name','data','zIndex','color','type','fillOpacity','lineWidth'],
		]
	]
];
