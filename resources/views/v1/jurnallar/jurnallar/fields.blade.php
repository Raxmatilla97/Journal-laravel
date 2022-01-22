<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Authors Field -->
<div class="form-group col-sm-6">
    {!! Form::label('authors', 'Authors:') !!}
    {!! Form::text('authors', null, ['class' => 'form-control']) !!}
</div>

<!-- Abstr Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('abstr_content', 'Abstr Content:') !!}
    {!! Form::textarea('abstr_content', null, ['class' => 'form-control']) !!}
</div>

<!-- Abstraksiya Pdf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abstraksiya_pdf', 'Abstraksiya Pdf:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('abstraksiya_pdf', ['class' => 'custom-file-input']) !!}
            {!! Form::label('abstraksiya_pdf', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Abiut Cite Article Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('abiut_cite_article', 'Abiut Cite Article:') !!}
    {!! Form::textarea('abiut_cite_article', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Journal Pdf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_journal_pdf', 'Full Journal Pdf:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('full_journal_pdf', ['class' => 'custom-file-input']) !!}
            {!! Form::label('full_journal_pdf', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
