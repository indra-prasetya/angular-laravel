<p ng-if="authenticatedUser">
    Hello {{authenticatedUser.username}}
</p>
<p ng-if="!authenticatedUser">
    Hello guest, please <a href="/auth/login">Login</a> to use the app
</p>
