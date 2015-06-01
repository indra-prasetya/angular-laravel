<div ng-controller="PostController">
    <form class="form-horizontal" ng-submit="create()" novalidate>
        <fieldset>
            <div class="form-group">
                <div class="col-md-5">
                    <input id="body" name="title" type="text" placeholder="Enter your Title" class="form-control input-md"
                           ng-model="title" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <input id="body" name="body" type="text" placeholder="Enter your Content" class="form-control input-md"
                           ng-model="body" required>
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


