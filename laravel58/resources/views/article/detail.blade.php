@extends('layouts.app')
@section('content')
<style>
	.article_content h2 { font-size: 1.4rem }
	.article_content { font-family: Roboto, sans-serif;}
	.main-contact-area { margin-top: 20px }
</style>
<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="">Home</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
                                <li class="home">
									<a href="{{ route('get.list.article') }}" title="Bài viết">Bài viết</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>{{ $articleDetail->a_name }}</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="main-contact-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
                        <div class="article_content" style="margin-bottom: 20px;margin-right: 43px">
                            <strong style="font-size: 25px;color: #333">{{ $articleDetail->a_name }}</strong>
                            <p style="font-size: 20px;color: #333">{{ $articleDetail->a_description }}</p>
                            <p style="font-size: 20px;color: #333">{!! $articleDetail->a_content !!}</p>
                        </div>
						<h4>Bài viết khác</h4>
                        @include('components.article')
                    </div>
                    <div class="col-sm-3">
						<h5>Bài viết nổi bật</h5>
						<div class="list_article_hot">
							@include('components.article_hot')
						</div>
                    </div>
				</div>
			</div>
		</div>
@stop
