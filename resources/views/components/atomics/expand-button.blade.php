@once
    <style>
        .btn-atomic-expand {
            height: 44px;
            min-width: 44px;
            max-width: 44px;
            padding: 0 11px;
            border-radius: 999px;
            background-color: var(--btn-bg, #0D3559);
            border: 1px solid var(--btn-bg, #0D3559);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: flex-start;
            overflow: hidden;
            white-space: nowrap;
            transition: max-width 0.28s cubic-bezier(0.4, 0, 0.2, 1),
                        background-color 0.2s ease,
                        box-shadow 0.2s ease;
        }

        .btn-atomic-expand:hover,
        .btn-atomic-expand:focus-visible {
            max-width: var(--btn-max-w, 140px);
            background-color: var(--btn-hover, #134673);
            border-color: var(--btn-hover, #134673);
            color: #ffffff;
            box-shadow: 0 6px 16px rgba(13, 53, 89, 0.25);
        }

        .btn-atomic-expand .btn-atomic-label {
            opacity: 0;
            max-width: 0;
            margin-left: 0;
            font-size: 0.9rem;
            font-weight: 600;
            transition: opacity 0.2s ease 0.05s,
                        max-width 0.28s cubic-bezier(0.4, 0, 0.2, 1),
                        margin-left 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-atomic-expand:hover .btn-atomic-label,
        .btn-atomic-expand:focus-visible .btn-atomic-label {
            opacity: 1;
            max-width: 180px;
            margin-left: 8px;
        }
    </style>
@endonce

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'btn btn-atomic-expand shadow-sm',
    'aria-label' => $texto,
    'style' => "--btn-bg: {$color}; --btn-hover: {$hoverColor}; --btn-max-w: {$maxWidth};"
]) }}>
    <i class="bi {{ $icono }} fs-5 lh-1 flex-shrink-0"></i>
    <span class="btn-atomic-label">{{ $texto }}</span>
</button>