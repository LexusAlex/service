import Link from "next/link";

export const Header = () => {
  return (
    <header>
      <Link href={"/"}>Page 1</Link>
      <Link href={"/blog"}>Page 2</Link>
      <Link href={"/video"}>Page 3</Link>
    </header>
  )
}
