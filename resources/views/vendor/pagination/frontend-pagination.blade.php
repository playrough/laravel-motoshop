@if ($paginator->hasPages())
	<nav class="pt-4 mt-2 mt-sm-3">
		<ul class="pagination pagination-lg">
			@if ($paginator->onFirstPage())
				<li class="page-item disabled me-auto">
					<a class="page-link d-flex align-items-center h-100 fs-lg px-2" href="#">
						<i class="ci-chevron-left mx-1"></i>
					</a>
				</li>
			@else
				<li class="page-item disabled me-auto">
					<a class="page-link d-flex align-items-center h-100 fs-lg px-2" href="{{ $paginator->previousPageUrl() }}">
						<i class="ci-chevron-left mx-1"></i>
					</a>
				</li>
			@endif
			@foreach ($elements as $element)
				@if (is_string($element))
					<li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
				@endif
				
				@if (is_array($element))
					@foreach ($element as $page => $url)
						@if ($page == $paginator->currentPage())
							<li class="page-item active"><span class="page-link">{{ $page }}</span></li>
						@else
							<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
						@endif
					@endforeach
				@endif
			@endforeach
			@if ($paginator->hasMorePages())
				<li class="page-item ms-auto">
					<a class="page-link d-flex align-items-center h-100 fs-lg px-2" href="{{ $paginator->nextPageUrl() }}">
						<i class="ci-chevron-right mx-1"></i>
					</a>
				</li>
			@else
				<li class="page-item ms-auto">
					<a class="page-link d-flex align-items-center h-100 fs-lg px-2" href="#">
						<i class="ci-chevron-right mx-1"></i>
					</a>
				</li>
			@endif
		</ul>
	</nav>
@endif