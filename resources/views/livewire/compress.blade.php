<div x-data="compressor" class="cmp">
    <style>
        [x-cloak]{display:none !important}
        .cmp{--background:#fbfaf8;--foreground:#3d3b38;--card:#fff;--primary:#c0392b;--primary-fg:#fff;--secondary:#efeeeb;--secondary-fg:#4a4845;--muted:#f5f4f2;--muted-fg:#75726e;--accent:#fdeeec;--accent-fg:#a8281b;--border:#d3d1cd;--success:#2f7a45;
            min-height:100vh;background:var(--background);color:var(--foreground);font-family:"Lato",Arial,system-ui,sans-serif;-webkit-font-smoothing:antialiased}
        .cmp *,.cmp *::before,.cmp *::after{box-sizing:border-box}
        .cmp button{font:inherit;cursor:pointer}
        .cmp button:focus-visible,.cmp [role=button]:focus-visible{outline:2px solid var(--primary);outline-offset:3px}
        .cmp ::selection{background:var(--primary);color:var(--primary-fg)}
        .cmp .mono{font-family:"IBM Plex Mono",ui-monospace,monospace}
        .cmp .wrap{max-width:64rem;margin:0 auto;padding:2.25rem 1.25rem}
        .cmp .tabs{display:flex;gap:.5rem;margin-bottom:1.5rem;border-bottom:1px solid var(--border)}
        .cmp .tab{padding:.75rem 1.5rem;border:0;border-bottom:3px solid transparent;margin-bottom:-1px;background:none;font-size:.875rem;font-weight:700;text-transform:uppercase;color:var(--muted-fg)}
        .cmp .tab:hover{color:var(--primary)}
        .cmp .tab.on{color:var(--primary);border-bottom-color:var(--primary)}
        .cmp .grid{display:grid;gap:1.5rem}
        .cmp .panel{display:flex;flex-direction:column;border:1px solid var(--border);background:var(--card);padding:1.25rem}
        .cmp .panel-head{margin-bottom:1.25rem;border-bottom:1px solid var(--border);padding-bottom:.75rem}
        .cmp .panel-head p{margin:0;font-size:.75rem;font-weight:700;text-transform:uppercase;color:var(--primary)}
        .cmp .label{margin:0 0 .75rem;font-size:.75rem;font-weight:700;text-transform:uppercase;color:var(--muted-fg)}
        .cmp .label.spaced{margin-top:1.5rem}
        .cmp .opts{display:grid;gap:.5rem}
        .cmp .opts.two{grid-template-columns:1fr 1fr}
        .cmp .opts.three{grid-template-columns:repeat(3,1fr)}
        .cmp .opts.four{grid-template-columns:repeat(4,1fr)}
        .cmp .opt{min-height:2.5rem;padding:.5rem .75rem;font-size:.875rem;font-weight:700;border:1px solid var(--border);background:var(--card);color:var(--secondary-fg);transition:color .15s,border-color .15s,background .15s}
        .cmp .opt:hover{border-color:var(--primary);color:var(--primary)}
        .cmp .opt.on{border-color:var(--primary);background:var(--primary);color:var(--primary-fg)}
        .cmp .opts.fmt .opt{background:var(--muted);color:var(--muted-fg)}
        .cmp .opts.fmt .opt:hover{color:var(--muted-fg)}
        .cmp .opts.fmt .opt.on{background:var(--accent);color:var(--accent-fg)}
        .cmp .note{margin:1rem 0 0;border-top:1px solid var(--border);padding-top:1rem;font-size:.75rem;line-height:1.25rem;color:var(--muted-fg)}
        .cmp .drop{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;cursor:pointer;border:1px dashed var(--border);background:var(--card);padding:3.5rem 1.5rem;text-align:center;transition:background .15s,border-color .15s;animation:cmp-pulse 2.2s ease-in-out infinite}
        .cmp .drop:hover{border-color:var(--primary);background:var(--muted)}
        .cmp .drop.over{border-color:var(--primary);background:var(--accent);animation:none}
        .cmp .drop-icon{width:56px;height:56px;margin:0 auto 1.25rem;border:2px solid var(--primary);border-radius:50%;color:var(--primary);display:flex;align-items:center;justify-content:center;transition:transform .15s}
        .cmp .drop:hover .drop-icon{transform:translateY(-4px)}
        .cmp .drop .t{margin:0;font-size:1rem;font-weight:700;text-transform:uppercase}
        .cmp .drop .s{margin:.5rem 0 0;font-size:.875rem;color:var(--muted-fg)}
        @keyframes cmp-pulse{0%,100%{border-color:var(--border)}50%{border-color:color-mix(in oklab,var(--primary) 70%,var(--border))}}
        .cmp .results{margin-top:2.5rem;border-top:2px solid var(--foreground);padding-top:1.25rem}
        .cmp .results-head{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:.75rem;margin-bottom:.75rem}
        .cmp .results-head .n{margin:0;font-size:.875rem;font-weight:700}
        .cmp .results-head .tot{margin:.125rem 0 0;font-size:.75rem;color:var(--muted-fg)}
        .cmp .actions{display:flex;gap:.5rem}
        .cmp .btn{border:1px solid transparent;padding:.5rem 1rem;font-size:.875rem;font-weight:700;text-transform:uppercase;background:var(--primary);color:var(--primary-fg);transition:opacity .15s}
        .cmp .btn:hover{opacity:.85}
        .cmp .btn.ghost{background:var(--card);border-color:var(--border);color:var(--secondary-fg);transition:color .15s,border-color .15s}
        .cmp .btn.ghost:hover{opacity:1;border-color:var(--primary);color:var(--primary)}
        .cmp .btn:disabled{opacity:.5;cursor:not-allowed}
        .cmp .btn.sm{font-size:.75rem}
        .cmp .row{display:flex;align-items:center;gap:1rem;border-bottom:1px solid var(--border);background:var(--card);padding:1rem .25rem;animation:cmp-fade .35s ease-out both}
        .cmp .row .ico{width:40px;height:40px;flex-shrink:0;display:flex;align-items:center;justify-content:center;border:1px solid var(--border);background:var(--muted);color:var(--muted-fg)}
        .cmp .row .info{min-width:0;flex:1}
        .cmp .row .nm{margin:0;font-size:.875rem;font-weight:500;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
        .cmp .row .st{margin:.125rem 0 0;font-size:.75rem;color:var(--muted-fg)}
        .cmp .row .st.err{color:var(--primary)}
        .cmp .badge{flex-shrink:0;padding:.25rem .625rem;font-size:.75rem;font-weight:600;background:var(--secondary);color:var(--muted-fg)}
        .cmp .badge.good{background:color-mix(in oklab,var(--success) 15%,transparent);color:var(--success)}
        @keyframes cmp-fade{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
        @media (min-width:640px){.cmp .wrap{padding:3rem 2rem}.cmp .panel{padding:1.5rem}.cmp .drop{padding-top:4rem;padding-bottom:4rem}}
        @media (min-width:1024px){.cmp .grid{grid-template-columns:.9fr 1.1fr;align-items:stretch}}
        @media (prefers-reduced-motion:reduce){.cmp *,.cmp *::before,.cmp *::after{animation-duration:.01ms !important;animation-iteration-count:1 !important}}
    </style>

    <div class="wrap">
        <div class="tabs" role="tablist">
            <button type="button" role="tab" class="tab {{ $tab === 'images' ? 'on' : '' }}" wire:click="$set('tab', 'images')">Images</button>
            <button type="button" role="tab" class="tab {{ $tab === 'files' ? 'on' : '' }}" wire:click="$set('tab', 'files')">Files</button>
        </div>

        <div class="grid">
            <section class="panel">
                <div class="panel-head"><p>01 / Settings</p></div>
                <p class="label">Compression strength</p>
                <div class="opts two">
                    @foreach (['Balanced', 'Strong', 'Extreme', 'Lossless-ish'] as $i => $label)
                        <button type="button" class="opt {{ $preset === $i ? 'on' : '' }}" wire:click="$set('preset', {{ $i }})">{{ $label }}</button>
                    @endforeach
                </div>

                @if ($tab === 'images')
                    <p class="label spaced">Output format</p>
                    <div class="opts four fmt">
                        @foreach (['original' => 'Original', 'image/webp' => 'WebP', 'image/jpeg' => 'JPEG', 'image/png' => 'PNG'] as $mime => $label)
                            <button type="button" class="opt {{ $format === $mime ? 'on' : '' }}" wire:click="$set('format', '{{ $mime }}')">{{ $label }}</button>
                        @endforeach
                    </div>
                    <p class="note">WebP gives the smallest files. Original keeps each image in its own format (JPG stays JPG). An image is never made larger than the original.</p>
                @else
                    <p class="label spaced">PDF pages</p>
                    <div class="opts two fmt">
                        <button type="button" class="opt {{ ! $flatten ? 'on' : '' }}" wire:click="$set('flatten', false)">Keep text</button>
                        <button type="button" class="opt {{ $flatten ? 'on' : '' }}" wire:click="$set('flatten', true)">Smallest</button>
                    </div>
                    <p class="note">{{ $flatten
                        ? 'Smallest turns every PDF page into a compressed picture, so even text-only PDFs shrink a lot. The text can no longer be selected or searched. Strength sets the page sharpness. A PDF is only replaced if the result is smaller.'
                        : 'Keep text keeps selectable text and only recompresses the images inside the PDF.' }}</p>
                    <p class="note">PDF and Office files (docx, xlsx, pptx, odt, ods, odp) are shrunk in their own format by recompressing the images inside them. Strength controls that image quality. Any other file is packed with maximum-level Zip compression.</p>
                @endif
            </section>

            <section class="panel">
                <div class="panel-head"><p>02 / Add files</p></div>
                <div class="drop" :class="{ over }" role="button" tabindex="0" aria-label="Choose files to compress"
                     @click="$refs.picker.click()"
                     @keydown.enter.prevent="$refs.picker.click()" @keydown.space.prevent="$refs.picker.click()"
                     @dragover.prevent="over = true" @dragleave="over = false"
                     @drop.prevent="over = false; add($event.dataTransfer.files)">
                    <input type="file" multiple hidden x-ref="picker" :accept="$wire.tab === 'images' ? 'image/*' : ''" @click.stop @change="add($event.target.files); $event.target.value = ''">
                    <div class="drop-icon">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v12"/><path d="m7 10 5 5 5-5"/><path d="M5 21h14"/></svg>
                    </div>
                    <p class="t">{{ $tab === 'images' ? 'Drop images here' : 'Drop files here' }}</p>
                    <p class="s">Everything is compressed locally on your machine — nothing is uploaded.</p>
                </div>
            </section>
        </div>

        <section class="results" x-show="visible().length" x-cloak>
            <div class="results-head">
                <div>
                    <p class="n" x-text="doneJobs().length + ' of ' + visible().length + ' finished'"></p>
                    <p class="tot mono" x-show="doneJobs().length" x-text="totals()"></p>
                </div>
                <div class="actions">
                    <button type="button" class="btn" x-show="doneJobs().length > 1" :disabled="busy" @click="saveAll()">Save all</button>
                    <button type="button" class="btn ghost" :disabled="busy" @click="clear()">Clear</button>
                </div>
            </div>
            <template x-for="job in visible()" :key="job.id">
                <div class="row">
                    <div class="ico">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg>
                    </div>
                    <div class="info">
                        <p class="nm" x-text="job.result ? job.result.name : job.file.name"></p>
                        <p class="st mono" :class="{ err: job.status === 'error' }"
                           x-text="job.status === 'done' ? fmt(job.result.originalSize) + ' → ' + fmt(job.result.compressedSize) : job.status === 'error' ? job.error : job.status === 'working' ? 'Compressing…' : 'Queued'"></p>
                    </div>
                    <span class="badge mono" x-show="job.status === 'done'" :class="{ good: job.result && saved(job.result) > 0 }"
                          x-text="job.result && saved(job.result) > 0 ? '−' + saved(job.result) + '%' : 'no gain'"></span>
                    <button type="button" class="btn sm" x-show="job.status === 'done'" @click="download(job.result)">Save</button>
                </div>
            </template>
        </section>
    </div>

    @script
    <script>
        const PRESETS = [
            { quality: 0.75, maxDimension: 2400, dpi: 130 },
            { quality: 0.55, maxDimension: 1800, dpi: 100 },
            { quality: 0.35, maxDimension: 1200, dpi: 72 },
            { quality: 0.92, maxDimension: 0, dpi: 170 },
        ];

        Alpine.data('compressor', () => ({
            jobs: [], over: false, busy: false,

            fmt(b) {
                if (!b) return '0 B';
                const s = ['B', 'KB', 'MB', 'GB'];
                const i = Math.min(Math.floor(Math.log(b) / Math.log(1024)), 3);
                return (b / 1024 ** i).toFixed(i ? 1 : 0) + ' ' + s[i];
            },
            saved(r) { return r.originalSize ? Math.round((1 - r.compressedSize / r.originalSize) * 100) : 0; },
            visible() { return this.jobs.filter(j => j.kind === $wire.tab); },
            doneJobs() { return this.visible().filter(j => j.status === 'done' && j.result); },
            clear() { this.jobs = this.jobs.filter(j => j.kind !== $wire.tab); },
            totals() {
                const d = this.doneJobs();
                const a = d.reduce((s, j) => s + j.result.originalSize, 0);
                const b = d.reduce((s, j) => s + j.result.compressedSize, 0);
                return this.fmt(a) + ' → ' + this.fmt(b) + ' · saved ' + (a ? Math.round((1 - b / a) * 100) : 0) + '%';
            },

            async add(fileList) {
                const files = Array.from(fileList);
                if (!files.length) return;
                const kind = $wire.tab;
                const isImg = f => /^image\/(png|jpe?g|webp|avif|bmp|gif)$/.test(f.type);
                const ids = files.map(() => crypto.randomUUID());
                this.jobs.push(...files.map((file, i) => {
                    const wrong = (kind === 'images') !== isImg(file);
                    return {
                        id: ids[i], file, kind,
                        status: wrong ? 'error' : 'pending',
                        error: wrong ? (kind === 'images' ? 'Not an image — use the Files tab' : 'Image — use the Images tab') : undefined,
                    };
                }));
                this.busy = true;
                const p = { ...(PRESETS[$wire.preset] ?? PRESETS[0]), flatten: $wire.flatten };
                const format = $wire.format;
                for (const id of ids) {
                    const job = this.jobs.find(x => x.id === id);
                    if (!job || job.status === 'error') continue;
                    job.status = 'working';
                    try {
                        job.result = kind === 'images' ? await this.image(job.file, p, format) : await this.compress(job.file, p);
                        job.status = 'done';
                    } catch (e) {
                        job.status = 'error';
                        job.error = e.message || 'Failed';
                    }
                }
                this.busy = false;
            },

            async compress(file, p) {
                const ext = (file.name.split('.').pop() || '').toLowerCase();
                try {
                    if (ext === 'pdf') return await this.pdf(file, p);
                    if (['docx', 'xlsx', 'pptx', 'odt', 'ods', 'odp'].includes(ext)) return await this.office(file, p);
                } catch (e) {
                    // fall through to plain zip if the format-specific path fails (e.g. encrypted PDF)
                }
                return await this.zip(file);
            },

            // Re-encodes an image blob, scaled down to p.maxDimension. Returns { blob, w, h }.
            async encode(source, p, mime, orientation = 'from-image') {
                const bmp = await createImageBitmap(source, { imageOrientation: orientation });
                let w = bmp.width, h = bmp.height;
                if (p.maxDimension && Math.max(w, h) > p.maxDimension) {
                    const k = p.maxDimension / Math.max(w, h);
                    w = Math.round(w * k); h = Math.round(h * k);
                }
                const c = document.createElement('canvas');
                c.width = w; c.height = h;
                const ctx = c.getContext('2d');
                if (mime === 'image/jpeg') { ctx.fillStyle = '#fff'; ctx.fillRect(0, 0, w, h); }
                ctx.drawImage(bmp, 0, 0, w, h);
                bmp.close();
                if (mime === 'image/png' && window.UPNG) {
                    // canvas PNG is always lossless and ignores quality, so reduce the palette instead
                    const colors = p.quality >= 0.9 ? 0 : p.quality >= 0.7 ? 256 : p.quality >= 0.5 ? 128 : 64;
                    const px = ctx.getImageData(0, 0, w, h);
                    return { blob: new Blob([UPNG.encode([px.data.buffer], w, h, colors)], { type: 'image/png' }), w, h };
                }
                const blob = await new Promise((res, rej) => c.toBlob(b => b ? res(b) : rej(new Error('Encoding failed')), mime, p.quality));
                return { blob, w, h };
            },

            async image(file, p, format) {
                const mime = format === 'original'
                    ? (['image/jpeg', 'image/png', 'image/webp'].includes(file.type) ? file.type : 'image/webp')
                    : format;
                const { blob } = await this.encode(file, p, mime);
                // never hand back something larger than what was dropped in
                if (blob.size >= file.size) return { blob: file, name: file.name, originalSize: file.size, compressedSize: file.size };
                const ext = { 'image/webp': '.webp', 'image/jpeg': '.jpg', 'image/png': '.png' }[mime];
                return { blob, name: file.name.replace(/\.[^.]+$/, '') + ext, originalSize: file.size, compressedSize: blob.size };
            },

            // Keeps the original file when recompression did not make it smaller.
            finish(file, bytes) {
                const blob = bytes.length < file.size ? new Blob([bytes], { type: file.type || 'application/octet-stream' }) : file;
                return { blob, name: file.name, originalSize: file.size, compressedSize: blob.size };
            },

            async pdf(file, p) {
                const { PDFDocument, PDFName, PDFNumber, PDFRawStream, PDFArray, PDFDict, PDFRef, PDFBool } = PDFLib;
                const doc = await PDFDocument.load(await file.arrayBuffer(), { updateMetadata: false });
                const K = (k) => PDFName.of(k);
                const get = (dict, key) => {
                    let v = dict.get(K(key));
                    if (v instanceof PDFRef) v = doc.context.lookup(v);
                    return v;
                };
                const nm = (v) => (v instanceof PDFName ? v.toString() : '');
                const num = (v) => (v && typeof v.asNumber === 'function' ? v.asNumber() : 0);

                // number of colour components for spaces we can safely convert to RGB/Gray (0 = unsupported)
                const components = (cs) => {
                    if (cs instanceof PDFName) return { '/DeviceRGB': 3, '/DeviceGray': 1, '/CalRGB': 3, '/CalGray': 1 }[cs.toString()] || 0;
                    if (cs instanceof PDFArray) {
                        const t = nm(cs.lookup(0));
                        if (t === '/CalRGB') return 3;
                        if (t === '/CalGray') return 1;
                        if (t === '/ICCBased') {
                            const n = num(cs.lookup(1)?.dict?.lookup(K('N')));
                            return n === 3 || n === 1 ? n : 0;
                        }
                    }
                    return 0;
                };

                // undo PNG-style row filters used by Flate images
                const unfilter = (raw, w, h, n) => {
                    const row = w * n, out = new Uint8Array(row * h);
                    if (raw.length < (row + 1) * h) return null;
                    for (let y = 0; y < h; y++) {
                        const ft = raw[y * (row + 1)];
                        for (let x = 0; x < row; x++) {
                            const cur = raw[y * (row + 1) + 1 + x];
                            const a = x >= n ? out[y * row + x - n] : 0;
                            const b = y ? out[(y - 1) * row + x] : 0;
                            const c = x >= n && y ? out[(y - 1) * row + x - n] : 0;
                            let v;
                            if (ft === 0) v = cur;
                            else if (ft === 1) v = cur + a;
                            else if (ft === 2) v = cur + b;
                            else if (ft === 3) v = cur + ((a + b) >> 1);
                            else {
                                const pa = Math.abs(b - c), pb = Math.abs(a - c), pc = Math.abs(a + b - 2 * c);
                                v = cur + (pa <= pb && pa <= pc ? a : pb <= pc ? b : c);
                            }
                            out[y * row + x] = v & 255;
                        }
                    }
                    return out;
                };

                const toImageData = (px, w, h, n) => {
                    const rgba = new Uint8ClampedArray(w * h * 4);
                    for (let i = 0, j = 0; i < w * h; i++, j += 4) {
                        if (n === 3) { rgba[j] = px[i * 3]; rgba[j + 1] = px[i * 3 + 1]; rgba[j + 2] = px[i * 3 + 2]; }
                        else { rgba[j] = rgba[j + 1] = rgba[j + 2] = px[i]; }
                        rgba[j + 3] = 255;
                    }
                    return new ImageData(rgba, w, h);
                };

                for (const [ref, obj] of doc.context.enumerateIndirectObjects()) {
                    if (!(obj instanceof PDFRawStream)) continue;
                    try {
                        const d = obj.dict;
                        if (nm(get(d, 'Subtype')) !== '/Image') continue;
                        const mask = get(d, 'ImageMask');
                        if ((mask instanceof PDFBool && mask.asBoolean()) || d.has(K('Mask')) || d.has(K('Decode'))) continue;
                        if (num(get(d, 'BitsPerComponent')) !== 8) continue;
                        const n = components(get(d, 'ColorSpace'));
                        if (!n) continue;

                        const f = get(d, 'Filter');
                        const filters = f instanceof PDFArray ? f.asArray().map(nm) : [nm(f)];
                        if (filters.length !== 1) continue;
                        const w = num(get(d, 'Width')), h = num(get(d, 'Height'));
                        if (!w || !h) continue;

                        let source;
                        if (filters[0] === '/DCTDecode') {
                            source = new Blob([obj.contents], { type: 'image/jpeg' });
                        } else if (filters[0] === '/FlateDecode') {
                            let parms = get(d, 'DecodeParms');
                            if (parms instanceof PDFArray) parms = parms.lookup(0);
                            const predictor = parms instanceof PDFDict ? num(parms.lookup(K('Predictor'))) || 1 : 1;
                            const raw = pako.inflate(obj.contents);
                            let px;
                            if (predictor === 1) px = raw.length >= w * h * n ? raw : null;
                            else if (predictor >= 10) px = unfilter(raw, w, h, n);
                            if (!px) continue;
                            source = toImageData(px, w, h, n);
                        } else continue;

                        // skip tiny images (icons, bullets): not worth the quality hit
                        if (w * h < 40000) continue;
                        const { blob, w: nw, h: nh } = await this.encode(source, p, 'image/jpeg', 'none');
                        if (blob.size >= obj.contents.length) continue;
                        const bytes = new Uint8Array(await blob.arrayBuffer());
                        d.set(K('Width'), PDFNumber.of(nw));
                        d.set(K('Height'), PDFNumber.of(nh));
                        d.set(K('ColorSpace'), K('DeviceRGB'));
                        d.set(K('BitsPerComponent'), PDFNumber.of(8));
                        d.set(K('Filter'), K('DCTDecode'));
                        d.delete(K('DecodeParms'));
                        d.set(K('Length'), PDFNumber.of(bytes.length));
                        doc.context.assign(ref, PDFRawStream.of(d, bytes));
                    } catch (e) { /* leave this image untouched */ }
                }
                let best = await doc.save({ useObjectStreams: true });
                if (p.flatten) {
                    try {
                        const flat = await this.flattenPdf(await file.arrayBuffer(), p);
                        if (flat.length < best.length) best = flat;
                    } catch (e) { /* keep the optimized version */ }
                }
                return this.finish(file, best);
            },

            loadScript(src) {
                return new Promise((res, rej) => {
                    const el = document.createElement('script');
                    el.src = src; el.onload = res; el.onerror = () => rej(new Error('Could not load ' + src));
                    document.head.appendChild(el);
                });
            },

            // Renders every page to a JPEG and rebuilds the PDF from those pictures.
            async flattenPdf(buffer, p) {
                const base = 'https://cdn.jsdelivr.net/npm/pdfjs-dist@3.11.174/build/';
                if (!window.pdfjsLib) await this.loadScript(base + 'pdf.min.js');
                if (!pdfjsLib.GlobalWorkerOptions.workerSrc) {
                    // workers can't be started from a cross-origin URL, so wrap the script in a blob
                    const code = await (await fetch(base + 'pdf.worker.min.js')).text();
                    pdfjsLib.GlobalWorkerOptions.workerSrc = URL.createObjectURL(new Blob([code], { type: 'text/javascript' }));
                }
                // pdf.js paces rendering with requestAnimationFrame, which pauses in background tabs
                const realRaf = window.requestAnimationFrame;
                window.requestAnimationFrame = (cb) => setTimeout(() => cb(performance.now()), 0);
                try {
                    return await this.renderPdfPages(buffer, p);
                } finally {
                    window.requestAnimationFrame = realRaf;
                }
            },

            async renderPdfPages(buffer, p) {
                const src = await pdfjsLib.getDocument({ data: new Uint8Array(buffer.slice(0)) }).promise;
                const out = await PDFLib.PDFDocument.create();
                const scale = (p.dpi || 100) / 72;
                for (let i = 1; i <= src.numPages; i++) {
                    const page = await src.getPage(i);
                    const size = page.getViewport({ scale: 1 });
                    const view = page.getViewport({ scale });
                    const c = document.createElement('canvas');
                    c.width = Math.ceil(view.width); c.height = Math.ceil(view.height);
                    const ctx = c.getContext('2d');
                    ctx.fillStyle = '#fff'; ctx.fillRect(0, 0, c.width, c.height);
                    await page.render({ canvasContext: ctx, viewport: view }).promise;
                    const blob = await new Promise((res, rej) => c.toBlob(b => b ? res(b) : rej(new Error('Encoding failed')), 'image/jpeg', p.quality));
                    const img = await out.embedJpg(new Uint8Array(await blob.arrayBuffer()));
                    out.addPage([size.width, size.height]).drawImage(img, { x: 0, y: 0, width: size.width, height: size.height });
                    page.cleanup();
                }
                await src.destroy();
                return await out.save({ useObjectStreams: true });
            },

            async office(file, p) {
                const files = fflate.unzipSync(new Uint8Array(await file.arrayBuffer()));
                for (const [path, data] of Object.entries(files)) {
                    const m = path.match(/\.(jpe?g|png)$/i);
                    if (!m || !/(^|\/)(media|Pictures)\//i.test(path)) continue;
                    try {
                        const mime = m[1].toLowerCase() === 'png' ? 'image/png' : 'image/jpeg';
                        const { blob } = await this.encode(new Blob([data], { type: mime }), p, mime);
                        if (blob.size < data.length) files[path] = new Uint8Array(await blob.arrayBuffer());
                    } catch (e) { /* leave this image untouched */ }
                }
                const entries = {};
                for (const [path, data] of Object.entries(files)) entries[path] = [data, { level: path === 'mimetype' ? 0 : 9 }];
                return this.finish(file, fflate.zipSync(entries));
            },

            async zip(file) {
                const data = new Uint8Array(await file.arrayBuffer());
                const zipped = fflate.zipSync({ [file.name]: [data, { level: 9 }] });
                const blob = new Blob([zipped], { type: 'application/zip' });
                return { blob, name: file.name + '.zip', originalSize: file.size, compressedSize: blob.size };
            },

            download(r) {
                const url = URL.createObjectURL(r.blob);
                const a = document.createElement('a');
                a.href = url; a.download = r.name; a.click();
                setTimeout(() => URL.revokeObjectURL(url), 5000);
            },

            async saveAll() {
                const entries = {};
                for (const [i, j] of this.doneJobs().entries()) {
                    let name = j.result.name;
                    while (entries[name]) name = `(${i}) ${name}`;
                    entries[name] = new Uint8Array(await j.result.blob.arrayBuffer());
                }
                const blob = new Blob([fflate.zipSync(entries, { level: 0 })], { type: 'application/zip' });
                this.download({ blob, name: 'compressed-files.zip' });
            },
        }));
    </script>
    @endscript
</div>
