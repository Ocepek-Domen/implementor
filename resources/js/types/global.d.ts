import type { Auth } from '@/types/auth';

type GtagConsentStatus = 'granted' | 'denied';

interface GtagConsentParams {
    ad_storage?: GtagConsentStatus;
    ad_user_data?: GtagConsentStatus;
    ad_personalization?: GtagConsentStatus;
    analytics_storage?: GtagConsentStatus;
    wait_for_update?: number;
}

interface FbqFunction {
    (...args: unknown[]): void;
    callMethod?: (...args: unknown[]) => void;
    queue: unknown[];
    loaded: boolean;
    version: string;
    push: FbqFunction;
}

declare global {
    interface Window {
        gtag?: (command: string, action: string, params?: GtagConsentParams) => void;
        fbq?: FbqFunction;
        _fbq?: FbqFunction;
        dataLayer?: unknown[];
    }
}

// Extend ImportMeta interface for Vite...
declare module 'vite/client' {
    interface ImportMetaEnv {
        readonly VITE_APP_NAME: string;
        [key: string]: string | boolean | undefined;
    }

    interface ImportMeta {
        readonly env: ImportMetaEnv;
        readonly glob: <T>(pattern: string) => Record<string, () => Promise<T>>;
    }
}

declare module '@inertiajs/core' {
    export interface InertiaConfig {
        sharedPageProps: {
            name: string;
            auth: Auth;
            sidebarOpen: boolean;
            [key: string]: unknown;
        };
    }
}

declare module 'vue' {
    interface ComponentCustomProperties {
        $inertia: typeof Router;
        $page: Page;
        $headManager: ReturnType<typeof createHeadManager>;
    }
}
