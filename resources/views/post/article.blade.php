
@extends('post.post')

@section('content')
    <article id="" class="post tag-laravel tag-laravel-5-1 tag-xin-ban-ben-fa-bu" style="margin-bottom:20px;">
        @if($article->is_recommend == App\Models\Article::ARTICLE_IS_RECOMMEND_YES)
            <div class="featured" title="推荐文章">
                <span class="glyphicon glyphicon-star"></span>
            </div>
        @endif
        <div class="post-head">
            <h1 class="post-title"><a href="">{{$article->title}}</a></h1>
            <div class="post-meta">
                <span class="author">作者：<a target="_blank" href="http://weibo.com/2962035201/profile?topnav=1&wvr=6&is_all=1" style="color: #f4645f">{{$article->admin->name}}</a></span> &bull;
                <time class="post-date"  title="{$val['updated_at']}">{{ str_limit($article->created_at, 10, '')}}</time>
            </div>
        </div>
        <div class="featured-media">
            <!--<a href="#"><img src="{$val['article_photo']}" alt="图片" style="height:200px;"></a>-->
        </div>
        <div class="post-content">
            <p>{!! $article->content !!}</p>
        </div>


        <footer class="post-footer clearfix">
            <div class="pull-left tag-list">
                <span class="glyphicon glyphicon-folder-open"></span>
                @foreach($article->tags as $tag)<a href="{{ route('article-by-tag', ['tag' => $tag->mark]) }}">{{ $tag->title }}</a>@endforeach

            </div>
            <div class="pull-right share">
            </div>
        </footer>
    </article>



    <div id="comments" style="margin-bottom: 100px;">
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#post" aria-controls="post" role="tab" data-toggle="tab"><strong>评论</strong></a></li>
             </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="post">
                    <div class="conmments" style="background-color:#ffffff;">
                        <table class="table table-striped">
                            <colgroup>
                                <col  />
                                <col style="width: 15%" />
                            </colgroup>
                            <tbody>
                            @foreach($article->comments as $key=> $comment)
                                <tr>
                                    <td colspan="2">
                                        <div class="nickname"><strong style="color: #3c8dbc">{{$comment->nickname}}</strong>&nbsp;&nbsp;&nbsp;{{ $comment->created_at }}<span class="pull-right">&nbsp;&nbsp;&nbsp;{{$key+1}}楼</span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="word-break:break-all">{{$comment->content}}</td>
                                    <td><a href="#new" onclick="reply(this);" data-name="{{ $comment->nickname }}" style="color: #3c8dbc">回复</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <div id="new" style="margin-top:20px;padding-bottom: 5px;padding-top: 5px;">
            <form action="{{ route('comment.store') }}" method="POST" class="form-horizontal">
                {!! csrf_field() !!}
                <input type="hidden" name="article_id" value="{{ $article->getKey() }}"/>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" name="nickname" class="form-control" placeholder="昵称" value="{{ old('nickname') }}">
                    </div>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" placeholder="有新评论会邮件通知你（可不填）" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    {{--<label for="newFormContent" class="col-sm-1 control-label">评论</label>--}}
                    <div class="col-sm-12">
                        <textarea name="content" id="newFormContent" class="form-control" rows="2" placeholder="评论">{{ old('content') }}</textarea>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 10px;">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-lg btn-danger col-lg-12">发表评论</button>
                    </div>
                </div>
            </form>
        </div>
        <script>
            function reply(a) {
                var obj = $(a);
                var nickname = obj.attr('data-name');
                var teatArea = $("#newFormContent");
                teatArea.val('@'+nickname+' ');
                teatArea.focus();
            }

            function submitRegister()
            {

            }
        </script>
    </div>
@stop

