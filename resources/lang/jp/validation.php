<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => '属性を受け入れる必要があります。',
    'active_url'           => '属性は有効なURLではありません。',
    'after'                => '属性は、日付の後の日付でなければなりません。',
    'after_or_equal'       => '属性は日付以下の日付でなければなりません。',
    'alpha'                => '属性は文字のみを含むことができます。',
    'alpha_dash'           => '属性は、文字、数字、およびダッシュだけを含むことができます。',
    'alpha_num'            => '属性には文字と数字のみを含めることができます。',
    'array'                => '属性は配列でなければなりません。',
    'before'               => '属性はbefore：dateという日付でなければなりません。',
    'before_or_equal'      => '属性は日付の前の日付である必要があります。',
    'between'              => [
        'numeric' => '属性は、minと：maxの間になければなりません。',
        'file'    => '属性は、minと：maxキロバイトの間でなければなりません。',
        'string'  => '属性は、minと：maxの間の値でなければなりません。',
        'array'   => '属性は：minと：maxの間にある必要があります.'
    ],
    'boolean'              => '属性フィールドはtrueまたはfalseでなければなりません。',
    'confirmed'            => '属性の確認が一致しません。',
    'date'                 => '属性は有効な日付ではありません。',
    'date_format'          => '属性はformat：formatと一致しません。',
    'different'            => '属性と：otherは異なる必要があります。',
    'digits'               => '属性は：digits digitsでなければなりません。',
    'digits_between'       => '属性は、minと：maxの間になければなりません。',
    'dimensions'           => '属性に無効な画像サイズがあります。',
    'distinct'             => '属性フィールドに重複値があります。',
    'email'                => '属性は有効な電子メールアドレスでなければなりません。',
    'exists'               => '選択された：属性は無効です。',
    'file'                 => '属性はファイルでなければなりません。',
    'filled'               => '属性フィールドには値が必要です。',
    'image'                => '属性はイメージでなければなりません。',
    'in'                   => '選択された：属性は無効です。',
    'in_array'             => '属性フィールドは：otherには存在しません。',
    'integer'              => '属性は整数でなければなりません。',
    'ip'                   => '属性は有効なIPアドレスでなければなりません。',
    'ipv4'                 => '属性は有効なIPv4アドレスでなければなりません。',
    'ipv6'                 => '属性は有効なIPv6アドレスでなければなりません。',
    'json'                 => '属性は有効なJSON文字列でなければなりません。',
    'max'                  => [
        'numeric' => '属性は以下より大きくてはならない。',
        'file'    => '属性は、最大キロバイトを超えてはならない。',
        'string'  => '属性は、最大文字以下であってはならない。',
        'array'   => '属性は、最大値以下の項目を持つことはできません。'
    ],
    'mimes'                => '属性は：：値のタイプのファイルでなければなりません。',
    'mimetypes'            => '属性は：：値のタイプのファイルでなければなりません。',
    'min'                  => [
        'numeric' => '属性は最低でも最低でなければなりません。',
        'file'    => '属性は最低でも最小KBでなければなりません。',
        'string'  => '属性は最低でも最小文字でなければなりません。',
        'array'   => '属性には、最低でも最低限の項目が必要です。'
    ],
    'not_in'               => '選択された：属性が無効です.',
    'not_regex'            => '属性形式が無効です。',
    'numeric'              => '属性は数字でなければなりません。',
    'present'              => '属性フィールドが存在する必要があります。',
    'regex'                => '属性形式が無効です。',
    'required'             => '属性フィールドは必須です。',
    'required_if'          => '属性フィールドは、otherが：valueの場合に必要です。',
    'required_unless'      => 'otherが：inの値でなければ、：属性フィールドは必須です。',
    'required_with'        => '属性フィールドは、値が存在する場合に必須です。',
    'required_with_all'    => '属性フィールドは、値が存在する場合に必須です。',
    'required_without'     => '属性フィールドは、値が存在しない場合に必須です。',
    'required_without_all' => '属性フィールドは、値が存在しない場合に必須です。',
    'same'                 => '属性と：otherは一致する必要があります。',
    'size'                 => [
        'numeric' => '属性は：sizeでなければなりません。',
        'file'    => '属性は以下のようにしなければなりません：size kilobytes.',
        'string'  => '属性は：size文字でなければなりません。',
        'array'   => '属性には、サイズの項目が含まれていなければなりません。'
    ],
    'string'               => '属性は文字列でなければなりません。',
    'timezone'             => '属性は有効なゾーンでなければなりません。',
    'unique'               => '属性はすでに使用されています。',
    'uploaded'             => '属性をアップロードできませんでした。',
    'url'                  => '属性形式が無効です。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'カスタムメッセージ',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
