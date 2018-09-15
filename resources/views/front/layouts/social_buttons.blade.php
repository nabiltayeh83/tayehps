{!! Share::page(url()->full(), $result->title)
	->facebook()
	->twitter()
	->googlePlus()
	->linkedin($result->keywords); !!}
