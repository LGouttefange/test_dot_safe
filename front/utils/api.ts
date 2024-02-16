import { $fetch } from "ofetch";
import {
  NitroFetchOptions,
  NitroFetchRequest,
  TypedInternalResponse,
} from "nitropack";

export const fetchApi = (
  $url: NitroFetchRequest,
  $options: NitroFetchOptions<any> = {},
): Promise<TypedInternalResponse> =>
  $fetch($url, {
    ...$options,
    baseURL: "http://localhost/api",
  });
