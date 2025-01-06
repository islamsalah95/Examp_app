import { defineConfig } from 'vite';
export default defineConfig({
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler'
            },
        },
    },
    build: {
        rollupOptions: {
            input: {
                main: 'resources/js/main.js',
            },
            output: {
                entryFileNames: 'assets/[name].js',
                chunkFileNames: 'assets/[name].js',
                assetFileNames: 'assets/[name].[ext]',
            }
        },
        sourcemap: false
    }
});
