<div ng-controller="PostController" ng-init="findOne()">
    <form class="form-horizontal" ng-submit="update(post)" novalidate>
        <fieldset>
            <div class="form-group">
                <div class="col-md-5">
                    <input id="body" name="title" type="text" value="{{post.title}}" class="form-control input-md"
                           ng-model="post.title" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <input id="body" name="body" type="text" value="{{post.body}}" class="form-control input-md"
                           ng-model="post.body" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <input type="submit" id="submit" name="submit" class="btn btn-primary"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>


