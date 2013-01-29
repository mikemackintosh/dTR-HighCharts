dTR-HighCharts
==============

Example Usage:

`$data = $app['db']->fetchAll("SELECT name,date,value FROM table");
			$series = new Graph();
			$series->setData($data)
				->seriesName("name")
				->isDate(true)
				->dataColumn('value')
				->dateColumn('date');`
				
Then simply `echo $series` will return a `json_encoded` array for use within your HighCharts script.
				
