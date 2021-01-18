@php
    /** @var App\Models\BlogPost $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if ($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#maindata"
                           class="nav-link active"
                           data-toggle="tab"
                           role="tab"
                        > Основные данные </a>
                    </li>
                    <li class="nav-item">
                        <a href="#adddata"
                           class="nav-link"
                           data-toggle="tab"
                           role="tab"
                        > Дополнительные данные  </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" value="{{ $item->title }}"
                                   id="title"
                                   name="title"
                                   class="form-control"
                                   minlength="3"
                                   required
                            >
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      class="form-control"
                                      rows="10">{{ old('content_raw', $item->content_raw) }}
                            </textarea>
                        </div>
                    </div>

                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required
                            >
                                @foreach($categoryList as $category)
                                    <option value="{{ $category->id }}"
                                            @if($category->id == $item->category_id) selected @endif>
                                        {{ $category->combobox_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input type="text"
                                   value="{{ $item->slug }}"
                                   id="slug"
                                   name="slug"
                                   class="form-control"
                            >
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Выддержка</label>
                            <textarea name="excerpt"
                                      id="excerpt"
                                      class="form-control"
                                      rows="3">{{ old('excerpt', $item->excerpt) }}
                            </textarea>
                        </div>

                        <div class="form-check">
                            <input name="is_published" type="hidden" value="0">
                            <input name="is_published"
                                   id="is_published"
                                   type="checkbox"
                                   class="form-check-input"
                                   value="1"
                                   @if ($item->is_published)
                                       checked="checked"
                                   @endif
                            >
                            <label for="is_published" class="form-check-label">Опубликовано</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>