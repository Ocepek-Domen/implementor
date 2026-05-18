# Build Notes

## npm run build — must run inside Docker

The host machine runs Node.js 18.19.1, but Vite requires Node.js 20.19+ or 22.12+.
Running `npm run build` directly on the host fails with `CustomEvent is not defined`.

**Always run the build inside the Docker container:**

```bash
docker exec laravel12_implementor_app bash -c "cd /var/www/implementor && npm run build"
```

Same applies to any other Vite/Node commands that fail on the host due to Node version.
