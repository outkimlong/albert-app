@props(['value'])

@if(!empty($value))
    <div {{ $attributes }}>
        <div id="latex-{{ md5($value) }}"></div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex/dist/katex.min.css">
    <script src="https://cdn.jsdelivr.net/npm/katex/dist/katex.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            katex.render(
                `{!! addslashes($value) !!}`,
                document.getElementById("latex-{{ md5($value) }}"),
                { throwOnError: false }
            );
        });
    </script>
@endif
