@section:content

<h1 class="text-3xl font-semibold mb-6">{{page.title}}</h1>

<p class="mb-6">@say:common.welcome Your application is installed and ready to use.</p>

<p class="mb-6">Bones v{{bones.version}} | App v{{app.version}}</p>

@endsection

@use:examples/layouts/container